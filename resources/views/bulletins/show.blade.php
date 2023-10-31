<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Boletim do Aluno</title>
</head>

<body>
    <div class="col-12 d-flex justify-content-center">
        <div class="col-md-6 mt-5">
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
        <div class="col-12 d-flex justify-content-center">
            <table class="table table-striped table-sm table-bordered col-md-6">
                <caption><strong>N. Registros: {{ $classRoom->disciplines->count() }}</strong></caption>
                <thead class="text-primary">
                    <tr>
                        <th scope="col" style="width: 250px">Nome</th>
                        <th scope="col" style="width: 50px">N1</th>
                        <th scope="col" style="width: 40px">F1</th>
                        <th scope="col" style="width: 50px">N2</th>
                        <th scope="col" style="width: 40px">F2</th>
                        <th scope="col" style="width: 50px">N3</th>
                        <th scope="col" style="width: 40px">F3</th>
                        <th scope="col" style="width: 50px">N4</th>
                        <th scope="col" style="width: 40px">F4</th>
                        <th scope="col" style="width: 80px">Média</th>
                        <th scope="col" style="width: 80px">Faltas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classRoom->disciplines as $discipline)
                        <tr>
                            <td>{{ $discipline->name }}</td>
                            <td>{{ $notes->where('discipline_id', $discipline->id)->first()->note1 ?? '' }}</td>
                            <td>{{ $notes->where('discipline_id', $discipline->id)->first()->lack1 ?? '' }}</td>
                            <td>{{ $notes->where('discipline_id', $discipline->id)->first()->note2 ?? '' }}</td>
                            <td>{{ $notes->where('discipline_id', $discipline->id)->first()->lack2 ?? '' }}</td>
                            <td>{{ $notes->where('discipline_id', $discipline->id)->first()->note3 ?? '' }}</td>
                            <td>{{ $notes->where('discipline_id', $discipline->id)->first()->lack3 ?? '' }}</td>
                            <td>{{ $notes->where('discipline_id', $discipline->id)->first()->note4 ?? '' }}</td>
                            <td>{{ $notes->where('discipline_id', $discipline->id)->first()->lack4 ?? '' }}</td>
                            <td id="media-{{ $student->id }}"></td>
                            <td id="faltas-{{ $student->id }}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endisset

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('white') }}/js/core/jquery.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calculateMediaAndFaltas = function(studentId) {
                const note1 = parseFloat($(`input[name="notes[${studentId}][note1]"]`).val()) || 0;
                const note2 = parseFloat($(`input[name="notes[${studentId}][note2]"]`).val()) || 0;
                const note3 = parseFloat($(`input[name="notes[${studentId}][note3]"]`).val()) || 0;
                const note4 = parseFloat($(`input[name="notes[${studentId}][note4]"]`).val()) || 0;

                const lack1 = parseInt($(`input[name="notes[${studentId}][lack1]"]`).val()) || 0;
                const lack2 = parseInt($(`input[name="notes[${studentId}][lack2]"]`).val()) || 0;
                const lack3 = parseInt($(`input[name="notes[${studentId}][lack3]"]`).val()) || 0;
                const lack4 = parseInt($(`input[name="notes[${studentId}][lack4]"]`).val()) || 0;

                const media = ((note1 + note2 + note3 + note4) / 4).toFixed(1);
                const faltas = lack1 + lack2 + lack3 + lack4;

                $(`#media-${studentId}`).text(media);
                $(`#faltas-${studentId}`).text(faltas);
            };

            $('.note-input, .lack-input').on('input', function() {
                const studentId = $(this).attr('name').match(/\d+/)[0];
                calculateMediaAndFaltas(studentId);
            });

            $('.note-input, .lack-input').each(function() {
                const studentId = $(this).attr('name').match(/\d+/)[0];
                calculateMediaAndFaltas(studentId);
            });
        });
    </script>
</body>

</html>
