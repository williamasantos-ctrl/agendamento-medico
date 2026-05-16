<?php

use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\AgendasController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Models\Especialidade;
use App\Models\Paciente;
use Database\Seeders\PacientesSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::prefix('v1')->group(function () {

Route::resource('/pacientes', PacientesController::class);
Route::resource('/agendamentos', AgendamentosController::class);
Route::resource('/medicos', MedicosController::class);
Route::resource('/especialidades', EspecialidadesController::class);
Route::resource('/agendas', AgendasController::class);

});

