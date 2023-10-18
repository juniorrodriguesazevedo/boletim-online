<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <strong>ID:</strong> #{{ $ticket->id }}<br>
        <strong>Site:</strong> {{ env('APP_NAME') }}<br>
        <strong>Data:</strong> {{ $ticket->created_at }}<br>
        <strong>Usuário:</strong> {{ $ticket->user->name }}<br>
        <strong>Assunto:</strong> {{ $ticket->title }}<br>
    </div>
</body>
</html>
