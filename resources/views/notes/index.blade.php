@extends('layouts.app', ['page' => 'Notas', 'pageSlug' => 'notes'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Notas</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'notes.index', 'method' => 'GET']) !!}
                    <div class="row align-items-center">
                        <div class="col-4">
                            {!! Form::label('class_room_id', 'Turmas') !!}
                            {!! Form::select('class_room_id', $classRooms->pluck('name', 'id'), isset($classRoom) ? $classRoom->id : null, [
                                'class' => 'form-control',
                                'placeholder' => 'Selecione...',
                            ]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('Pesquisar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                    @isset($classRoom)
                        <div class="text-center mt-2 mb-2">
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

                        <table class="table table-striped">
                            <caption><strong>N. Registros: {{ $classRoom->disciplines->count() }}</strong></caption>
                            <thead class="text-primary">
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col" style="width: 82px">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classRoom->disciplines as $discipline)
                                    <tr>
                                        <td>{{ $discipline->name }}</td>
                                        <td class="btn-toolbar">
                                            <div class="btn-group mr-1">
                                                <a href="{{ route('notes.show', ['class_room' => $classRoom->id, 'discipline' => $discipline->id]) }}"
                                                    class="btn btn-info ">
                                                    Lança notas
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endisset

                </div>
            </div>
        </div>
    </div>
@endsection
