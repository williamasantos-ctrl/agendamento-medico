<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ConsultaCanceladaMail;
use App\Models\Agenda;
use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AgendasController extends Controller
{
    public function cancelarTurno(Request $request)
    {
        $request->validate([
            'id_medico' => 'required|exists:medicos,id_medico',
            'data_agendamento' => 'required|date',
            'horario' => 'required'
        ]);

        $agendamentos = Agendamento::with('paciente', 'medico')
        ->where('id_medico', $request->id_medico)
        ->where('data_agendamento', $request->data_agendamento)
        ->where('horario', $request->horario)
        ->where('status', '!=', 'cancelado')
        ->get();

        if ($agendamentos->isEmpty()){
            return response()->json(['message' => 'Nenhum agendamento encontrado para este turno'], 200);
        }

        foreach($agendamentos as $agendamento) {
            $agendamento->update(['status' => 'cancelado']);

            if($agendamento->paciente->email){
                Mail::to($agendamento->paciente->email)->send(new ConsultaCanceladaMail($agendamento));
            }
        }

        return response()->json([
            'message' => 'Turno cancelado com sucesso.',
            'notificados' => $agendamentos->count() . 'paciente(s) notificado(s).'],200);
    }

   public function index()
    {
        return response()->json(Agenda::with('medicos')->get(), 200);
    }

    public function store(Request $request)
    {
        dd(\App\Models\Medico::find($request->id_medico));

        $data = $request->validate([
            'id_medico'        => 'required|exists:medicos,id_medico',
            'horario_inicio'   => 'required|date_format:H:i',
            'horario_fim'      => 'required|date_format:H:i|after:horario_inicio',
            'duracao_consulta' => 'required|integer|min:10',
            'dia_semana'       => 'required|string'
        ]);

        $agenda = Agenda::create($data);
        return response()->json($agenda->load('medico'), 201);
    }

    public function show($id)
    {
        $agenda = Agenda::with('medico')->findOrFail($id);
        return response()->json($agenda);
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        $data = $request->validate([
            'horario_inicio'   => 'date_format:H:i',
            'horario_fim'      => 'date_format:H:i|after:horario_inicio',
            'duracao_consulta' => 'integer|min:10',
            'dia_semana'       => 'string'
        ]);

        $agenda->update($data);
        return response()->json($agenda);
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        return response()->json(null, 204);
    }
}
