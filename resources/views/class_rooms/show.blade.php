@extends('layouts.app', ['page' => 'Turma', 'pageSlug' => 'class_rooms'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Vizualizar Turma</h3>
                        </div>

                        <div class="col-4 text-right">
                            <a href="{{ route('class-rooms.index') }}" class="btn btn-sm btn-primary">Volta</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Código: </strong></p>
                                <p class="card-text">
                                    {{ $classRoom->code ?? 'SEM CÓDIGO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Nome: </strong></p>
                                <p class="card-text">
                                    {{ $classRoom->name }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Período: </strong></p>
                                <p class="card-text">
                                    {!! period($classRoom->period) !!}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Ano: </strong></p>
                                <p class="card-text">
                                    {{ $classRoom->year }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Professores: </strong></p>
                                <p class="card-text">
                                <ul>
                                    @foreach ($classRoom->users as $teacher)
                                        <li>{{ $teacher->name }}</li>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Matérias: </strong></p>
                                <p class="card-text" style="list-style-type: none;">
                                    @foreach ($classRoom->disciplines as $discipline)
                                        <span style="display: inline-block;">
                                            {{ $discipline->name }}
                                            @if (!$loop->last)
                                                -
                                            @endif
                                        </span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Alunos</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('class-rooms.pdf', $classRoom->id) }}" class="btn btn-sm btn-danger"
                                target="_blank" title="Gerar PDF">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <caption><strong>N. Registros: {{ $classRoom->students->count() }}</strong></caption>
                        <thead class="text-primary">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Nome da Mãe</th>
                                <th scope="col">Telefone</th>
                                <th scope="col" style="width: 82px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classRoom->students as $student)
                                <tr>
                                    <td>#{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->name_mother }}</td>
                                    <td>{{ $student->phone_first }}</td>
                                    <td class="btn-toolbar">
                                        <div class="btn-group mr-1">
                                            <a href="{{ route('class-rooms.show', $student->id) }}"
                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group mr-1">
                                            <a href="{{ route('class-rooms.edit', $student->id) }}"
                                                class="btn btn-success btn-sm btn-round btn-icon">
                                                <i class="fas fa-tools"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
