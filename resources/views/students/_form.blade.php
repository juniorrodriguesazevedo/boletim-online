{!! Form::open([
    'route' => isset($classRoom) ? ['class-rooms.update', $classRoom->id] : 'class-rooms.store',
    'method' => isset($classRoom) ? 'PUT' : 'POST',
]) !!}
<div class="row">
    <div class="col-md-3">
        {!! Form::label('code', 'Código', ['class' => 'required']) !!}
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

    <div class="row col-12">
        @isset($disciplines)
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Disciplinas</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($disciplines as $discipline)
                            <div class="col">
                                {!! Form::checkbox(
                                    'disciplines[]',
                                    $discipline->id,
                                    isset($role) && $role->disciplines->contains($discipline->id) ? true : false,
                                    ['id' => $discipline->id],
                                ) !!}
                                {!! Form::label($discipline->id, $discipline->name, ['class' => 'mr-2']) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endisset

        @isset($teachers)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Professores</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($teachers as $teacher)
                            <div class="col">
                                {!! Form::checkbox(
                                    'teachers[]',
                                    $teacher->id,
                                    isset($role) && $role->teachers->contains($teacher->id) ? true : false,
                                    ['id' => $teacher->id],
                                ) !!}
                                {!! Form::label($teacher->id, $teacher->name, ['class' => 'mr-2']) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endisset

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Alunos</h4>
                </div>
                <div class="card-body">
                    {!! Form::text('code', isset($classRoom) ? $classRoom->code : null, ['class' => 'form-control']) !!}
                    @include('alerts.feedback', ['field' => 'code'])
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
