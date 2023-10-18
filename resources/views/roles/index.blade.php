@extends('layouts.app', ['page' => 'Atribuicoes', 'pageSlug' => 'roles'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">Funções</h3>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Adicionar Novo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <caption><strong>N. Registros: {{ $roles->count() }}</strong></caption>
                      <thead class="text-primary">
                        <tr>
                          <th scope="col">Nome</th>
                          <th scope="col">Descrição</th>
                          <th scope="col">Dt. de Criação</th>
                          <th scope="col" style="width: 120px">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td class="btn-toolbar">
                                    <div class="btn-group mr-1">
                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm btn-round btn-icon">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-1">
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success btn-sm btn-round btn-icon">
                                            <i class="fas fa-tools"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('roles.destroy', $role->id) }}" id="form-{{ $role->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" rel="tooltip" class="btn-delete btn btn-danger btn-sm btn-round btn-icon">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-start" aria-label="...">
                    {{ $roles->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
