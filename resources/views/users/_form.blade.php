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
        {!! Form::label('cpf', 'CPF') !!}
        {!! Form::text('cpf', isset($user) ? $user->cpf : null, ['class' => 'form-control', 'data-mask' => 'cpf']) !!}
        @include('alerts.feedback', ['field' => 'cpf'])
    </div>
    <div class="col-md-3">
        {!! Form::label('rg', 'RG') !!}
        {!! Form::text('rg', isset($user) ? $user->rg : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'rg'])
    </div>
    <div class="col-md-3">
        {!! Form::label('cns', 'Cartão Nacinal de Saúde (CNS)') !!}
        {!! Form::text('cns', isset($user) ? $user->cns : null, ['class' => 'form-control', 'data-mask' => 'cns']) !!}
        @include('alerts.feedback', ['field' => 'cns'])
    </div>
    <div class="col-md-3">
        {!! Form::label('birth_date', 'Data de Nascimento') !!}
        {!! Form::date('birth_date', isset($user) ? $user->date : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'birth_date'])
    </div>
    <div class="col-md-3">
        {!! Form::label('color', 'Raça/Cor') !!}
        {!! Form::select(
            'color',
            [
                'Preto' => 'Preto',
                'Pardo' => 'Pardo',
                'Branco' => 'Branco',
                'Indígena' => 'Indígena',
                'Amarelo' => 'Amarelo',
            ],
            isset($user) ? $user->color : null,
            [
                'class' => 'form-control',
                'placeholder' => 'Selecione...',
            ],
        ) !!}
        @include('alerts.feedback', ['field' => 'color'])
    </div>
    <div class="col-md-3">
        {!! Form::label('sex', 'Sexo', ['class' => 'required']) !!}
        {!! Form::select('sex', ['M' => 'Masculino', 'F' => 'Feminino'], isset($user) ? $user->sex : null, [
            'class' => 'form-control',
            'placeholder' => 'Selecione...',
        ]) !!}
        @include('alerts.feedback', ['field' => 'sex'])
    </div>
    <div class="col-md-4">
        {!! Form::label('naturalness', 'Naturalidade') !!}
        {!! Form::text('naturalness', isset($user) ? $user->naturalness : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'naturalness'])
    </div>
    <div class="col-md-4">
        {!! Form::label('phone', 'Telefone') !!}
        {!! Form::text('phone', isset($user) ? $user->phone : null, ['class' => 'form-control', 'data-mask' => 'phone']) !!}
        @include('alerts.feedback', ['field' => 'phone'])
    </div>
    <div class="col-md-4">
        {!! Form::label('cbo_id', 'Classificação Brasileira de Ocupações (CBO)') !!}
        {!! Form::select('cbo_id', $cbos->pluck('name', 'id'), isset($user) ? $user->cbo_id : null, [
            'class' => 'form-control',
            'placeholder' => 'Selecione...',
        ]) !!}
        @include('alerts.feedback', ['field' => 'cbo_id'])
    </div>
    <div class="col-md-6">
        {!! Form::label('name_father', 'Pai') !!}
        {!! Form::text('name_father', isset($user) ? $user->name_father : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'name_father'])
    </div>
    <div class="col-md-6">
        {!! Form::label('name_mother', 'Mãe') !!}
        {!! Form::text('name_mother', isset($user) ? $user->name_mother : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'name_mother'])
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
            {!! Form::text('role_id', getRole($user->roles), [
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
