@extends('layouts.pdfs.app')

@section('content')
    <div class="text-center">
        <strong>Turno: </strong> {!! period($classRoom->period) !!} <br>
        <strong>Turma: </strong> {{ $classRoom->name }} <br>
        <strong>Código: </strong> {{ $classRoom->code ?? 'SEM CÓDIGO' }} <br>
        <strong>Professores: </strong>
        {{ implode(', ', $classRoom->users->pluck('name')->toArray()) }}
    </div>

    <h2 class="text-center mt-4">Alunos</h2>
    <table class="table table-striped">
        <caption><strong>N. Alunos: {{ $classRoom->students->count() }}</strong></caption>
        <thead class="text-primary">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classRoom->students as $student)
                <tr>
                    <td>#{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
