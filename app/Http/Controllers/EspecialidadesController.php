<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
  // Listar todas as especialidades
    public function index()
    {
        return response()->json(Especialidade::all(), 200);
    }

    // Criar uma nova (ex: Psicologia, Cardiologia)
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|unique:especialidades,nome',
            'descricao' => 'nullable|string'
        ]);

        $especialidade = Especialidade::create($data);
        return response()->json($especialidade, 201);
    }

    // Mostrar uma específica e os médicos vinculados a ela
    public function show($id)
    {
        $especialidade = Especialidade::with('medicos')->findOrFail($id);
        return response()->json($especialidade);
    }

    public function update(Request $request, $id)
    {
        $especialidade = Especialidade::findOrFail($id);
        
        $data = $request->validate([
            'nome' => 'string|unique:especialidades,nome,' . $id . ',id_especialidade',
            'descricao' => 'nullable|string'
        ]);

        $especialidade->update($data);
        return response()->json($especialidade);
    }

    public function destroy($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        $especialidade->delete();
        return response()->json(['message' => 'Especialidade removida'], 204);
    }
}
