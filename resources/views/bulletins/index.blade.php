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
                    <label for="code">ID do Aluno</label>
                    <input type="number" class="form-control" name="id" value="{{ old('id') ?? '' }}">
                    @error('id')
                        <div class="text-dange mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="code">Data de Nascimento</label>
                    <input type="number" id="dateMask" class="form-control" name="date" value="{{ old('date') ?? '' }}"
                        placeholder="__/__/____">
                    @error('date')
                        <div class="text-dange mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dateMask').inputmask("99/99/9999");
        });
    </script>
</body>

</html>
