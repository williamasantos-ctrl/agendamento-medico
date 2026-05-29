<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DetalhesConsultaMail;
use App\Models\Agendamento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AgendamentosController extends Controller
{
    
    public function index()
    {
       return response()->json(Agendamento::with(['paciente', 'medico'])->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_paciente' => 'required|exists:pacientes,id_paciente', 
            'id_medico'   => 'required|exists:medicos,id_medico',
            'data_consulta' => 'required|date|after_or_equal:today',
            'horario'     => 'required|date_format:H:i',
            'status'      => 'string'
        ]);

        $dataHoraConsulta = Carbon::parse(
            $data['data_consulta']. ' '.$data['horario']
        );

        $limiteMinimo = Carbon::now()->addHours(24);

        if($dataHoraConsulta < $limiteMinimo) {
            return response()->json([
                'message' => 'A consulta deve ser marcada com 24 horas de antecedência'
            ], 422);
        }

        $conflito = Agendamento::where('id_medico', $data['id_medico'])
        ->where('data_consulta', $data['data_consulta'])
        ->where('horario', $data['horario'])
        ->exists();

        if ($conflito) {

            return response()->json([
                'message' => 'Este médico já possui um agendamento neste horário'
            ], 409);
        }

        $agendamento = Agendamento::create($data);
        
        $agendamento->load(['paciente', 'medico']);

        if($agendamento->paciente->email){
            Mail::to($agendamento->paciente->email)->send(new DetalhesConsultaMail($agendamento));
        }
        return response()->json($agendamento->load(['paciente', 'medico']), 201);
    }

    public function show(string $id)
    {
        $agendamento = Agendamento::with(['paciente', 'medico'])->findOrFail($id);
        return response()->json($agendamento);
    }

    public function update(Request $request, string $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $data = $request->validate([
            'data_agendamento' => 'date|after_or_equal:today',
            'horario' => 'string',
            'status'  => 'string'
        ]);

        if($agendamento->status === 'Realizada' && $data['status'] === 'Cancelado') {
            return response()->json([
                'message' => 'Uma consulta realizada não pode ser cancelada'
            ], 422);
        }

        $agendamento->update($data);
        return response()->json($agendamento);
    }

    public function destroy(string $id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();
        return response()->json(['message' => 'Agendamento cancelado'], 204);
    }
}
