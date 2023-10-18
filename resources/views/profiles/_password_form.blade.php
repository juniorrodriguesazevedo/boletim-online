{!! Form::open([
    'route' => 'profiles.update',
    'method' => 'PUT',
]) !!}
<div class="row">
    <div class="col-md-12">
        {!! Form::label('password', 'Senha') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'password'])
    </div>
    <div class="col-md-12">
        {!! Form::label('password_confirmation', 'Confirmar Senha') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'password_confirmation'])
    </div>
    <div class="col-md-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
