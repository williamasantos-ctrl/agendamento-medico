<!DOCTYPE html>
<html>
<head>
    <title>Aviso de Cancelamento</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Olá, {{ $agendamento->paciente->nome }}.</h2>
    <p>Informamos que, devido a um imprevisto médico, a sua consulta agendada foi <strong>cancelada</strong>.</p>

    <p><strong>Detalhes da consulta cancelada:</strong></p>
    <ul>
        <li><strong>Médico:</strong> {{ $agendamento->medico->nome }}</li>
        <li><strong>Data:</strong> {{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y') }}</li>
        <li><strong>Horário:</strong> {{ $agendamento->horario }}</li>
    </ul>

    <p>Por favor, entre em contato com a nossa equipe ou acesse o sistema para escolher um novo horário disponível.</p>
    <p>Pedimos desculpas pelo transtorno.<br>Equipe Clínica Médica</p>
</body>
</html>