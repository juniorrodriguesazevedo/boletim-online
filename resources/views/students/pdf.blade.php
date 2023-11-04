@extends('layouts.pdfs.app')

@section('content')
    <div class="text-center">
        <strong>Aluno: </strong> {{ $student->name }} <br>
        <strong>Turma: </strong> {{ $classRoom->name }} <br>
        <strong>Código: </strong> {{ $classRoom->code ?? 'SEM CÓDIGO' }} <br>
        <strong>Turno: </strong> {!! period($classRoom->period) !!} <br>
        <strong>Ano: </strong> {{ $classRoom->year }} <br>
        <strong>Professores: </strong>
        {{ implode(', ', $classRoom->users->pluck('name')->toArray()) }}
    </div>

    <table class="table table-striped table-bordered table-sm">
        <caption><strong>N. Disciplinas: {{ $classRoom->disciplines->count() }}</strong></caption>
        <thead class="text-primary">
            <tr>
                <th scope="col">Disciplina</th>
                <th scope="col" style="width: 50px">N1</th>
                <th scope="col" style="width: 50px">F1</th>
                <th scope="col" style="width: 50px">N2</th>
                <th scope="col" style="width: 50px">F2</th>
                <th scope="col" style="width: 50px">N3</th>
                <th scope="col" style="width: 50px">F3</th>
                <th scope="col" style="width: 50px">N4</th>
                <th scope="col" style="width: 50px">F4</th>
                <th scope="col" style="width: 60px">Média</th>
                <th scope="col" style="width: 60px">Faltas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disciplines->sortBy('name') as $discipline)
                <tr>
                    <th scope="col">{{ $discipline->name }}</th>
                    @foreach ($notesByDiscipline[$discipline->name] as $note)
                        <td>{{ $note->note1 }}</td>
                        <td>{{ $note->lack1 }}</td>
                        <td>{{ $note->note2 }}</td>
                        <td>{{ $note->lack2 }}</td>
                        <td>{{ $note->note3 }}</td>
                        <td>{{ $note->lack3 }}</td>
                        <td>{{ $note->note4 }}</td>
                        <td>{{ $note->lack4 }}</td>
                        <td>{{ number_format(calculateAverage($note->note1, $note->note2, $note->note3, $note->note4), 1) }}</td>
                        <td>{{ calculateTotalLacks($note->lack1, $note->lack2, $note->lack3, $note->lack4) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
