@extends('layouts.app', ['page' => 'Alunos', 'pageSlug' => 'students'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Alunos</h3>
                        </div>

                        @can('admin_create')
                            <div class="col-4 text-right">
                                <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary">Adicionar Novo</a>
                            </div>
                        @endcan
                    </div>
                    {!! Form::open(['route' => 'students.index', 'method' => 'GET']) !!}
                    <div class="row align-items-center">
                        <div class="col-5">
                            {!! Form::text('search', request('search'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-5">
                            {!! Form::submit('Pesquisar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <caption><strong>N. Registros: {{ $students->count() }}</strong></caption>
                        <thead class="text-primary">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Nome da Mãe</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Status</th>
                                @can('admin_edit')
                                    <th scope="col" style="width: 82px">Ações</th>
                                @else
                                    <th scope="col" style="width: 40px">Ações</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>#{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->name_mother }}</td>
                                    <td>{{ $student->phone_first }}</td>
                                    <td>{!! status($student->status) !!}</td>
                                    <td class="btn-toolbar">
                                        <div class="btn-group mr-1">
                                            <a href="{{ route('students.show', $student->id) }}"
                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                        @can('admin_edit')
                                            <div class="btn-group mr-1">
                                                <a href="{{ route('students.edit', $student->id) }}"
                                                    class="btn btn-success btn-sm btn-round btn-icon">
                                                    <i class="fas fa-tools"></i>
                                                </a>
                                            </div>
                                        @endcan
                                        {{--  <div class="btn-group">
                                        <form action="{{ route('class-rooms.destroy', $student->id) }}" id="form-{{ $student->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" rel="tooltip" class="btn-delete btn btn-danger btn-sm btn-round btn-icon">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-start" aria-label="...">
                        {{ $students->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
