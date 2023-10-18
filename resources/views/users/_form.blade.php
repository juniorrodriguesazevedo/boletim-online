{!! Form::open([
    'route' => isset($user) ? ['users.update', $user->id] : 'users.store',
    'method' => isset($user) ? 'PUT' : 'POST',
]) !!}
<div class="row">
    <div class="col-md-6">
        {!! Form::label('name', 'Nome', ['class' => 'required']) !!}
        {!! Form::text('name', isset($user) ? $user->name : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'name'])
    </div>
    <div class="col-md-3">
        {!! Form::label('cpf', 'CPF', ['class' => 'required']) !!}
        {!! Form::text('cpf', isset($user) ? $user->cpf : null, ['class' => 'form-control', 'data-mask' => 'cpf']) !!}
        @include('alerts.feedback', ['field' => 'cpf'])
    </div>
    <div class="col-md-3">
        {!! Form::label('rg', 'RG') !!}
        {!! Form::text('rg', isset($user) ? $user->rg : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'rg'])
    </div>
    <div class="col-md-4">
        {!! Form::label('birth_date', 'Data de Nascimento', ['class' => 'required']) !!}
        {!! Form::date('birth_date', isset($user) ? $user->date : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'birth_date'])
    </div>
    <div class="col-md-4">
        {!! Form::label('sex', 'Sexo', ['class' => 'required']) !!}
        {!! Form::select('sex', ['M' => 'Masculino', 'F' => 'Feminino'], isset($user) ? $user->sex : null, [
            'class' => 'form-control',
            'placeholder' => 'Selecione...',
        ]) !!}
        @include('alerts.feedback', ['field' => 'sex'])
    </div>
    <div class="col-md-4">
        {!! Form::label('phone', 'Telefone', ['class' => 'required']) !!}
        {!! Form::text('phone', isset($user) ? $user->phone : null, ['class' => 'form-control', 'data-mask' => 'phone']) !!}
        @include('alerts.feedback', ['field' => 'phone'])
    </div>
    <div class="col-md-6">
        {!! Form::label('email', 'Email', ['class' => 'required']) !!}
        {!! Form::text('email', isset($user) ? $user->email : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'email'])
    </div>
    <div class="col-md-6">
        {!! Form::label('email_confirmation', 'Confirmar Email', ['class' => 'required']) !!}
        {!! Form::text('email_confirmation', isset($user) ? $user->email : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'email_confirmation'])
    </div>
    <div class="col-md-6">
        {!! Form::label('password', 'Senha', ['class' => empty($user) ? 'required' : null]) !!}
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'password'])
    </div>
    <div class="col-md-6">
        {!! Form::label('password_confirmation', 'Confirmar Senha', ['class' => empty($user) ? 'required' : null]) !!}
        {!! Form::text('password_confirmation', null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'password_confirmation'])
    </div>

    @empty($user)
        <div class="col-md-6">
            {!! Form::label('role_id', 'Função', ['class' => 'required']) !!}
            {!! Form::select('role_id', $roles->pluck('description', 'id'), null, [
                'class' => 'form-control',
                'placeholder' => 'Selecione...',
            ]) !!}
            @include('alerts.feedback', ['field' => 'role_id'])
        </div>
    @endempty

    @isset($user)
        <div class="col-md-6">
            {!! Form::label('role_id', 'Função') !!}
            {!! Form::text('role_id', $user->roles[0]->description ?? 'Sem função', [
                'class' => 'form-control',
                'disabled' => 'true',
            ]) !!}
            @include('alerts.feedback', ['field' => 'role_id'])
        </div>
    @endisset

    <div class="col-md-6">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', [1 => 'Ativo', 0 => 'Inativo'], isset($user) ? $user->status : null, [
            'class' => 'form-control',
        ]) !!}
        @include('alerts.feedback', ['field' => 'status'])
    </div>
    <div class="col-md-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
