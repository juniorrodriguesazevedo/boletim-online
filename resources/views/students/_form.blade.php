{!! Form::open([
    'route' => isset($student) ? ['students.update', $student->id] : 'students.store',
    'method' => isset($student) ? 'PUT' : 'POST',
]) !!}
<div class="row">
    <div class="col-md-8">
        {!! Form::label('name', 'Nome', ['class' => 'required']) !!}
        {!! Form::text('name', isset($student) ? $student->name : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'name'])
    </div>
    <div class="col-md-2">
        {!! Form::label('sex', 'Sexo', ['class' => 'required']) !!}
        {!! Form::select('sex', ['M' => 'Masculino', 'F' => 'Feminino'], isset($student) ? $student->sex : null, [
            'class' => 'form-control',
            'placeholder' => 'Selecione...',
        ]) !!}
        @include('alerts.feedback', ['field' => 'sex'])
    </div>
    <div class="col-md-2">
        {!! Form::label('birth_date', 'Data Nascimento', ['class' => 'required']) !!}
        {!! Form::date('birth_date', isset($student) ? $student->birth_date : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'birth_date'])
    </div>
    <div class="col-md-4">
        {!! Form::label('cpf', 'CPF') !!}
        {!! Form::text('cpf', isset($student) ? $student->cpf : null, ['class' => 'form-control', 'data-mask' => 'cpf']) !!}
        @include('alerts.feedback', ['field' => 'cpf'])
    </div>
    <div class="col-md-4">
        {!! Form::label('rg', 'RG') !!}
        {!! Form::text('rg', isset($student) ? $student->rg : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'rg'])
    </div>
    <div class="col-md-4">
        {!! Form::label('birth_certificate', 'Certidão de Nascimento') !!}
        {!! Form::text('birth_certificate', isset($student) ? $student->birth_certificate : null, [
            'class' => 'form-control',
        ]) !!}
        @include('alerts.feedback', ['field' => 'birth_certificate'])
    </div>
    <div class="col-md-4">
        {!! Form::label('name_mother', 'Nome da Mãe') !!}
        {!! Form::text('name_mother', isset($student) ? $student->name_mother : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'name_mother'])
    </div>
    <div class="col-md-4">
        {!! Form::label('name_father', 'Nome do Pai') !!}
        {!! Form::text('name_father', isset($student) ? $student->name_father : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'name_father'])
    </div>
    <div class="col-md-2">
        {!! Form::label('phone_first', 'Telefone Contato', ['class' => 'required']) !!}
        {!! Form::text('phone_first', isset($student) ? $student->phone_first : null, [
            'class' => 'form-control',
            'data-mask' => 'phone',
        ]) !!}
        @include('alerts.feedback', ['field' => 'phone_first'])
    </div>
    <div class="col-md-2">
        {!! Form::label('phone_second', 'Telefone Contato Secundário') !!}
        {!! Form::text('phone_second', isset($student) ? $student->phone_second : null, [
            'class' => 'form-control',
            'data-mask' => 'phone',
        ]) !!}
        @include('alerts.feedback', ['field' => 'phone_second'])
    </div>
    <div class="col-md-6">
        {!! Form::label('street', 'Rua', ['class' => 'required']) !!}
        {!! Form::text('street', isset($student) ? $student->street : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'street'])
    </div>
    <div class="col-md-4">
        {!! Form::label('district', 'Bairro', ['class' => 'required']) !!}
        {!! Form::text('district', isset($student) ? $student->district : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'district'])
    </div>
    <div class="col-md-2">
        {!! Form::label('number', 'Número', ['class' => 'required']) !!}
        {!! Form::text('number', isset($student) ? $student->number : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'number'])
    </div>
    <div class="col-md-12">
        {!! Form::label('observation', 'Observação Sobre o Aluno') !!}
        {!! Form::textarea('observation', isset($student) ? $student->observation : null, [
            'class' => 'description-textarea',
            'rows' => 4,
        ]) !!}
        @include('alerts.feedback', ['field' => 'observation'])
    </div>

    <div class="col-md-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
