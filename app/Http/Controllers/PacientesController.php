<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{

    public function index()
    {
        $paciente = Paciente::all();
        return $paciente;
    }

    public function store(Request $request)
    {
        $paciente = Paciente::create($request->all());
        return response()->json($paciente,201);
    }

    public function show($id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente){
            return response()->json(['message' => 'Paciente não encontrado'], 404);
        }
        return response()->json($paciente);
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente){
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        $paciente->update($request->all());
        return response()->json($paciente);
    }

    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        if(!$paciente){
            return response()->json(['message' => 'Paciente não encontrado'], 404);
        }
        $paciente->delete();
        return response()->json(['message' => 'Paciente deletado com sucesso']);
    }
}
