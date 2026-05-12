<?php

use App\Http\Controllers\PacientesController;
use App\Models\Paciente;
use Database\Seeders\PacientesSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::prefix('v1')->group(function () {

Route::resource('/pacientes', PacientesController::class);

});

