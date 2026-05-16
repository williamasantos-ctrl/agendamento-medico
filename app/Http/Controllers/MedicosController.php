<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function index()
    {
        $medico = Medico::all();
        return $medico;
    }

    public function store(Request $request)
    {
        $medico = Medico::create($request->all());
        return response()->json($medico,201);
    }

    public function show(string $id)
    {
        $medico = Medico::find($id);
        if (!$medico){
            return response()->json(['message' => 'Medico não encontrado'], 404);
        }
        return response()->json($medico);
    }

    public function update(Request $request, string $id)
    {
        $medico = Medico::find($id);
        if (!$medico){
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        $medico->update($request->all());
        return response()->json($medico);
    }

    public function destroy(string $id)
    {
        $medico = Medico::find($id);
        if(!$medico){
            return response()->json(['message' => 'Medico não encontrado'], 404);
        }
        $medico->delete();
        return response()->json(['message' => 'Medico deletado com sucesso']);
    }
}
