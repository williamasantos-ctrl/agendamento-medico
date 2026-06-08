<!DOCTYPE html>
<html>
<head>
    <title>Lembrete de Consulta</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Falta pouco, {{ $agendamento->paciente->nome }}!</h2>
    <p>Este é um lembrete de que você tem uma consulta agendada para as próximas 24 horas.</p>

    <p><strong>Informações Importantes:</strong></p>
    <ul>
        <li><strong>Médico:</strong> {{ $agendamento->medico->nome }}</li>
        <li><strong>Data:</strong> {{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y') }}</li>
        <li><strong>Horário:</strong> {{ $agendamento->horario }}</li>
    </ul>

    <p>Se você não puder comparecer, por favor, nos avise o quanto antes para liberarmos a vaga.</p>
    <p>Até breve,<br>Equipe Clínica Médica</p>
</body>
</html>