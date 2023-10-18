{!! Form::open([
    'route' => 'profiles.update',
    'method' => 'PUT',
]) !!}
<div class="row">
    <div class="col-md-12">
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'name'])
    </div>
    <div class="col-md-12">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', $user->email, [
            'class' => 'form-control',
            'disabled' => 'true'
            ]) !!}
        @include('alerts.feedback', ['field' => 'email'])
    </div>
    <div class="col-md-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
