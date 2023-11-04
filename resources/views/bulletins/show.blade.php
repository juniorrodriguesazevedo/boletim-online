<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Boletim do Aluno</title>

    <style>
        .font-small
        {
            font-size: small;
        }
    </style>
</head>

<body>
    <div class="col-12 d-flex justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="col-12 text-center mb-3"><strong>#{{$student->id}} - {{ $student->name }} <br></div></strong>
            {!! Form::open(['route' => ['bulletins.show', $student->id], 'method' => 'GET']) !!}
            <div class="input-group mb-3">
                {!! Form::select(
                    'class_room_id',
                    $student->classrooms->pluck('year', 'id'),
                    isset($classRoom) ? $classRoom->id : null,
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Selecione...',
                    ],
                ) !!}
                <div class="input-group-append">
                    {!! Form::submit('Pesquisar', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @isset($classRoom)
        <div class="text-center mt-2 mb-4 font-small">
            <strong>Código: </strong> {{ $classRoom->code }} <br>
            <strong>Turma: </strong> {{ $classRoom->name }} <br>
            <strong>Período: </strong> {!! period($classRoom->period) !!} <br>
            <strong>Ano: </strong> {{ $classRoom->year }} <br>
            <strong>Professores:</strong>
            <p style="list-style-type: none; display: inline;">
                @foreach ($classRoom->users as $user)
                    <span style="display: inline-block;">{{ $user->name }}</span>
                    @if (!$loop->last)
                        -
                    @endif
                @endforeach
            </p>
        </div>
        <div class="col-12 d-flex justify-content-center table-responsive">
            <table class="table table-striped table-sm table-bordered col-md-6" style="font-size: small;">
                <caption><strong>N. de Disciplinas: {{ $classRoom->disciplines->count() }}</strong></caption>
                <thead class="text-primary">
                    <tr>
                        <th scope="col" style="width: 230px">Nome</th>
                        <th scope="col" style="width: 40px">N1</th>
                        <th scope="col" style="width: 30px">F1</th>
                        <th scope="col" style="width: 40px">N2</th>
                        <th scope="col" style="width: 30px">F2</th>
                        <th scope="col" style="width: 40px">N3</th>
                        <th scope="col" style="width: 30px">F3</th>
                        <th scope="col" style="width: 40px">N4</th>
                        <th scope="col" style="width: 30px">F4</th>
                        <th scope="col" style="width: 40px">M</th>
                        <th scope="col" style="width: 40px">F</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classRoom->disciplines as $discipline)
                        <tr>
                            <td>{{ $discipline->name }}</td>
                            <td class="note">{{ $notes->where('discipline_id', $discipline->id)->first()->note1 ?? '' }}</td>
                            <td class="lack">{{ $notes->where('discipline_id', $discipline->id)->first()->lack1 ?? '' }}</td>
                            <td class="note">{{ $notes->where('discipline_id', $discipline->id)->first()->note2 ?? '' }}</td>
                            <td class="lack">{{ $notes->where('discipline_id', $discipline->id)->first()->lack2 ?? '' }}</td>
                            <td class="note">{{ $notes->where('discipline_id', $discipline->id)->first()->note3 ?? '' }}</td>
                            <td class="lack">{{ $notes->where('discipline_id', $discipline->id)->first()->lack3 ?? '' }}</td>
                            <td class="note">{{ $notes->where('discipline_id', $discipline->id)->first()->note4 ?? '' }}</td>
                            <td class="lack">{{ $notes->where('discipline_id', $discipline->id)->first()->lack4 ?? '' }}</td>
                            <td>
                                {{ number_format(calculateAverage(
                                    $notes->where('discipline_id', $discipline->id)->first()->note1 ?? null,
                                    $notes->where('discipline_id', $discipline->id)->first()->note2 ?? null,
                                    $notes->where('discipline_id', $discipline->id)->first()->note3 ?? null,
                                    $notes->where('discipline_id', $discipline->id)->first()->note4 ?? null,
                                ), 1) }}
                            </td>
                            <td>
                                {{ calculateTotalLacks(
                                    $notes->where('discipline_id', $discipline->id)->first()->lack1 ?? null,
                                    $notes->where('discipline_id', $discipline->id)->first()->lack2 ?? null,
                                    $notes->where('discipline_id', $discipline->id)->first()->lack3 ?? null,
                                    $notes->where('discipline_id', $discipline->id)->first()->lack4 ?? null,
                                ) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endisset
</body>

</html>
