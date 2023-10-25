@extends('layouts.app', ['page' => 'Turmas', 'pageSlug' => 'class_rooms'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">Turmas</h3>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('class-rooms.create') }}" class="btn btn-sm btn-primary">Adicionar Novo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <caption><strong>N. Registros: {{ $classCooms->count() }}</strong></caption>
                      <thead class="text-primary">
                        <tr>
                          <th scope="col">Código</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Período</th>
                          <th scope="col">Ano</th>
                          <th scope="col" style="width: 82px">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($classCooms as $classCoom)
                            <tr>
                                <td>{{ $classCoom->code ?? 'SEM CÓDIGO' }}</td>
                                <td>{{ $classCoom->name }}</td>
                                <td>{!! period($classCoom->period) !!}</td>
                                <td>{{ $classCoom->year }}</td>
                                <td class="btn-toolbar">
                                    <div class="btn-group mr-1">
                                        <a href="{{ route('class-rooms.show', $classCoom->id) }}" class="btn btn-info btn-sm btn-round btn-icon">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-1">
                                        <a href="{{ route('class-rooms.edit', $classCoom->id) }}" class="btn btn-success btn-sm btn-round btn-icon">
                                            <i class="fas fa-tools"></i>
                                        </a>
                                    </div>
                                   {{--  <div class="btn-group">
                                        <form action="{{ route('class-rooms.destroy', $classCoom->id) }}" id="form-{{ $classCoom->id }}" method="post">
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
                    {{ $classCooms->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
