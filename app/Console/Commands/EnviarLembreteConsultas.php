<?php

namespace App\Console\Commands;

use App\Mail\LembreteConsultaMail;
use App\Models\Agendamento;
use Carbon\Carbon;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

#[Signature('app:enviar-lembrete-consultas')]
#[Description('Command description')]
class EnviarLembreteConsultas extends Command
{
    protected $signature = 'consultas:enviar-lembretes';

    protected $description = 'Envia uma notificação por e-mail para pacientes com consultas nas próximas 24 horas';

    

    public function handle()
    {
    $hoje = Carbon::now();
    $amanha = Carbon::now()->addHours(24);

    $agendamentos = Agendamento::with(['paciente', 'medico'])
    ->whereBetween('data_agendamento', [$hoje->toDateString(), $amanha->toDateString()])
    ->where('status', '!=', 'cancelado')
    ->get();

    if($agendamentos->isEmpty()){
        $this->info('Nenhum agendamento encontrado para as próximas 24 horas.');
        return 0;
    }

    $enviados = 0;

    foreach($agendamentos as $agendamento){
        if($agendamento->paciente && $agendamento->paciente->email){
            Mail::to($agendamento->paciente->email)->send(new LembreteConsultaMail($agendamento));
            $enviados++;
        }
    }

    $this->info("Sucesso! {$enviados} lembretes de consulta foram enviados.");
    return 0;
    }
}
