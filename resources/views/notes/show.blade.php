@extends('layouts.app', ['page' => 'Notas', 'pageSlug' => 'notes'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Lançamento de Notas</h3>
                        </div>
                        <div class="col-4 text-right">
                            {!! Form::open(['route' => 'notes.index', 'method' => 'GET']) !!}
                            <input type="hidden" name="class_room_id" value="{{ $classRoom->id }}">
                            {!! Form::submit('Voltar', ['class' => 'btn btn-sm btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        action="{{ route('notes.update', ['class_room' => $classRoom->id, 'discipline' => $discipline->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="text-center mt-2 mb-5">
                            <strong>Código: </strong> {{ $classRoom->code }} <br>
                            <strong>Turma: </strong> {{ $classRoom->name }} <br>
                            <strong>Período: </strong> {!! period($classRoom->period) !!} <br>
                            <strong>Ano: </strong> {{ $classRoom->year }} <br>
                            <strong>Disciplina: </strong> {{ $discipline->name }} <br>
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
                        <table class="table table-striped">
                            <caption><strong>N. Registros: {{ $classRoom->students->count() }}</strong></caption>
                            <thead class="text-primary">
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col" style="width: 100px">N1</th>
                                    <th scope="col" style="width: 70px">F1</th>
                                    <th scope="col" style="width: 100px">N2</th>
                                    <th scope="col" style="width: 70px">F2</th>
                                    <th scope="col" style="width: 100px">N3</th>
                                    <th scope="col" style="width: 70px">F3</th>
                                    <th scope="col" style="width: 100px">N4</th>
                                    <th scope="col" style="width: 70px">F4</th>
                                    <th scope="col" style="width: 80px">Média</th>
                                    <th scope="col" style="width: 80px">Faltas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classRoom->students->sortBy('name') as $student)
                                    <tr>
                                        <td>#{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td><input type="text" name="notes[{{ $student->id }}][note1]"
                                                class="form-control note-input"
                                                value="{{ old('notes.' . $student->id . '.note1', $notes->where('student_id', $student->id)->first()->note1 ?? '') }}">
                                        </td>
                                        <td><input type="number" name="notes[{{ $student->id }}][lack1]"
                                                class="form-control lack-input"
                                                value="{{ old('notes.' . $student->id . '.lack1', $notes->where('student_id', $student->id)->first()->lack1 ?? '') }}">
                                        </td>
                                        <td><input type="text" name="notes[{{ $student->id }}][note2]"
                                                class="form-control note-input"
                                                value="{{ old('notes.' . $student->id . '.note2', $notes->where('student_id', $student->id)->first()->note2 ?? '') }}">
                                        </td>
                                        <td><input type="number" name="notes[{{ $student->id }}][lack2]"
                                                class="form-control lack-input"
                                                value="{{ old('notes.' . $student->id . '.lack2', $notes->where('student_id', $student->id)->first()->lack2 ?? '') }}">
                                        </td>
                                        <td><input type="text" name="notes[{{ $student->id }}][note3]"
                                                class="form-control note-input"
                                                value="{{ old('notes.' . $student->id . '.note3', $notes->where('student_id', $student->id)->first()->note3 ?? '') }}">
                                        </td>
                                        <td><input type="number" name="notes[{{ $student->id }}][lack3]"
                                                class="form-control lack-input"
                                                value="{{ old('notes.' . $student->id . '.lack3', $notes->where('student_id', $student->id)->first()->lack3 ?? '') }}">
                                        </td>
                                        <td><input type="text" name="notes[{{ $student->id }}][note4]"
                                                class="form-control note-input"
                                                value="{{ old('notes.' . $student->id . '.note4', $notes->where('student_id', $student->id)->first()->note4 ?? '') }}">
                                        </td>
                                        <td><input type="number" name="notes[{{ $student->id }}][lack4]"
                                                class="form-control lack-input"
                                                value="{{ old('notes.' . $student->id . '.lack4', $notes->where('student_id', $student->id)->first()->lack4 ?? '') }}">
                                        </td>
                                        <td>
                                            {{ calculateAverage(
                                                $notes->where('student_id', $student->id)->first()->note1,
                                                $notes->where('student_id', $student->id)->first()->note2,
                                                $notes->where('student_id', $student->id)->first()->note3,
                                                $notes->where('student_id', $student->id)->first()->note4,
                                            ) }}
                                        </td>
                                        <td>
                                            {{ calculateTotalLacks(
                                                $notes->where('student_id', $student->id)->first()->lack1,
                                                $notes->where('student_id', $student->id)->first()->lack2,
                                                $notes->where('student_id', $student->id)->first()->lack3,
                                                $notes->where('student_id', $student->id)->first()->lack4,
                                            ) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"
        integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.note-input').inputmask({
                alias: 'numeric',
                allowMinus: false,
                digits: 1,
                max: 10,
                min: 0,
                rightAlign: false,
                radixPoint: '.',
            });

            $('.lack-input').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
@endpush
