<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Boletim do Aluno</title>
    <style>
        body {
            background-color: #082E66;
            color: white;
        }

        .login-container {
            height: 100vh;
        }

        .login-title {
            text-align: center;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center login-container">
        <div class="col-12 col-md-6">
            <h2 class="login-title">Boletim do Aluno</h2>
            <form action="{{ route('bulletins.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="number" class="form-control" name="code" value="{{ old('login') ?? '' }}" placeholder="Código ou CPF">
                    @error('code')
                        <div class="text-dange mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="date" value="{{ old('date') ?? '' }}" placeholder="Data de Nascimento">
                    @error('date')
                    <div class="text-dange mt-1">{{ $message }}</div>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
