<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/util.css') }}">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(/imgs/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        Login
                    </span>
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" value="{{ old('email') }}"
                            placeholder="Seu email">
                    </div>
                    <div>
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Senha</span>
                        <input class="input100" type="password" name="password" placeholder="Sua senha">
                    </div>

                    <div>
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>

                    {{--    <div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div> --}}

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


{{-- <body>
    <div class="login-form">
        <h1>Hospital de Itacajá</h1>
        @if ($errors->has('inactive'))
            <span class="invalid-feedback" style="display: block; font-size: 12px; color: red; margin: 10px 5px;">
                {{ $errors->first('inactive') }}
            </span>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="Email">
                @include('alerts.feedback', ['field' => 'email'])
            </div>
            <div class="form-group log-status">
                <input type="password" name="password" class="form-control" placeholder="Senha">
                @include('alerts.feedback', ['field' => 'password'])
            </div>
            <div class="form-group log-status">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Senha">
            </div>
            <button type="submit" class="log-btn">Login</button>
        </form>
    </div>
</body> --}}

</html>
