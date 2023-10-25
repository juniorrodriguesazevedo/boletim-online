{!! Form::open([
    'route' => isset($classRoom) ? ['class-rooms.update', $classRoom->id] : 'class-rooms.store',
    'method' => isset($classRoom) ? 'PUT' : 'POST',
]) !!}
<div class="row">
    <div class="col-md-3">
        {!! Form::label('code', 'Código') !!}
        {!! Form::text('code', isset($classRoom) ? $classRoom->code : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'code'])
    </div>
    <div class="col-md-3">
        {!! Form::label('name', 'Nome', ['class' => 'required']) !!}
        {!! Form::text('name', isset($classRoom) ? $classRoom->name : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'name'])
    </div>
    <div class="col-md-3">
        {!! Form::label('year', 'Ano', ['class' => 'required']) !!}
        {!! Form::number('year', isset($classRoom) ? $classRoom->year : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'year'])
    </div>
    <div class="col-md-3">
        {!! Form::label('period', 'Período', ['class' => 'required']) !!}
        {!! Form::select(
            'period',
            [1 => 'MANHÃ', 2 => 'TARDE', 3 => 'NOITE'],
            isset($classRoom) ? $classRoom->period : null,
            [
                'class' => 'form-control',
            ],
        ) !!}
        @include('alerts.feedback', ['field' => 'period'])
    </div>

    <div class="col-12">
        <h4 class="mb-2">Disciplinas</h4>
        @foreach ($disciplines as $discipline)
            <div class="d-inline mr-3">
                {!! Form::checkbox(
                    'disciplines[]',
                    $discipline->id,
                    isset($classRoom) && $classRoom->disciplines->contains($discipline->id) ? true : false,
                    ['id' => $discipline->id],
                ) !!}
                {!! Form::label($discipline->id, $discipline->name, ['class' => 'mr-2']) !!}
            </div>
        @endforeach
        @include('alerts.feedback', ['field' => 'disciplines'])
    </div>

    <div class="col-md-12 mt-3">
        {!! Form::label('teachers[]', 'Professores', ['class' => isset($classRoom) ? '' : 'required']) !!}
        {!! Form::select('teachers[]', $teachers->pluck('name', 'id'), isset($classRoom) ? $classRoom->users : null, [
            'class' => 'form-control select2-multiple',
            'multiple' => 'multiple',
        ]) !!}
        @include('alerts.feedback', ['field' => 'teachers'])
    </div>

    <div class="col-md-12 mt-3 mb-3">
        {!! Form::label('students[]', 'Alunos', ['class' => isset($classRoom) ? '' : 'required']) !!}
        {!! Form::select('students[]', $students->pluck('name', 'id'), isset($classRoom) ? $classRoom->students : null, [
            'class' => 'form-control select2-multiple',
            'multiple' => 'multiple',
        ]) !!}
        @include('alerts.feedback', ['field' => 'students'])
    </div>

    <div class="col-md-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
