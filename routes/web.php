<?php

use App\Http\Controllers\PacientesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('Sistema de agendamento médico funcionando', 200);
});