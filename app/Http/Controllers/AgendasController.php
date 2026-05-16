<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendasController extends Controller
{
   public function index()
    {
        return response()->json(Agenda::with('medicos')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_medico'        => 'required|exists:medicos,id',
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
