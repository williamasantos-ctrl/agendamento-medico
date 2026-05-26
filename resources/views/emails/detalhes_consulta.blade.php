<!DOCTYPE html>
<html>
<head>
    <title>Detalhes da sua Consulta</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Olá, {{ $agendamento->paciente->nome }}!</h2>
    <p>Seu agendamento foi realizado com sucesso. Confira os detalhes abaixo:</p>

    <table style="border: 1px solid #ccc; padding: 10px; width: 100%;">
        <tr>
            <td><strong>Médico:</strong></td>
            <td>{{ $agendamento->medico->nome }}</td>
        </tr>
        <tr>
            <td><strong>Data:</strong></td>
            <td>{{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td><strong>Horário:</strong></td>
            <td>{{ $agendamento->horario }}</td>
        </tr>
        <tr>
            <td><strong>Status:</strong></td>
            <td>{{ ucfirst($agendamento->status) }}</td>
        </tr>
    </table>

    <p style="margin-top: 20px;">Caso precise cancelar ou reagendar, entre em contato conosco.</p>
    <p>Atenciosamente,<br>Clínica Médica</p>
</body>
</html>