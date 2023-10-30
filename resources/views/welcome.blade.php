<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Escola Municipal Tancredo Neves</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: #f7f7f7;
        }

        .landing-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('/imgs/welcome.jpg');
            background-size: cover;
            background-position: center;
        }

        .header {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }

        .menu a {
            display: inline-block;
            color: #ffffff;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
            position: relative;
            transition: color 0.3s ease;
        }

        .menu a::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #f9fcff;
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .menu a:hover {
            color: #f9fcff;
        }

        .menu a:hover::after {
            transform: scaleX(1);
        }

        .main-content {
            text-align: center;
        }

        .logo {
            color: #ffffff;
            font-size: 4rem;
            margin-bottom: 10px;
        }

        .tagline {
            font-size: 1.2rem;
            color: #ffffff;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="landing-page">
        <header class="header">
        <div class="menu">
                <a href="{{ route('bulletins.index') }}">Boletim</a>
            </div>
            <div class="menu">
                <a href="{{ route('login') }}">Login</a>
            </div>
        </header>
        <main class="main-content">
            <h1 class="logo">Escola Municipal Tancredo Neves</h1>
            <p class="tagline">Construindo o Futuro Juntos</p>
        </main>
    </div>
</body>

</html>
