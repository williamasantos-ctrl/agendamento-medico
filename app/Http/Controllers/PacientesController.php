<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Rules\CpfValido;
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
        $data = $request->validate([
        'nome'=> 'required|string|max:255',
        'cpf'=> ['required', 'digits:11', 'unique:pacientes, cpf', new CpfValido],
        'email'=> 'required|email:rfc,dns|unique:pacientes,email',
        'telefone'=> ['required', 'regex:/^(\(?\d{2}\)?\s?)?9?\d{4}-?\d{4}$/'],
        ], [
        'cpf.digits' => 'O CPF deve conter exatamente 11 dígitos numéricos.',
    'email.email' => 'O formato do e-mail é inválido. Certifique-se de incluir o @ e um domínio válido.',
    'telefone.regex' => 'O telefone deve seguir um padrão válido (ex: DD999999999 ou (DD) 99999-9999).']
        );
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
