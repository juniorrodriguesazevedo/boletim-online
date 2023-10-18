@extends('layouts.app', ['page' => 'Permissoes', 'pageSlug' => 'permissions'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">Permissões</h3>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">Adicionar Novo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <caption><strong>N. Registros: {{ $permissions->count() }}</strong></caption>
                      <thead class="text-primary">
                        <tr>
                          <th scope="col">Nome</th>
                          <th scope="col">Descrição</th>
                          <th scope="col">Dt. de Criação</th>
                          <th scope="col" style="width: 120px">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td class="btn-toolbar">
                                    <div class="btn-group mr-1">
                                        <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info btn-sm btn-round btn-icon">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-1">
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-success btn-sm btn-round btn-icon">
                                            <i class="fas fa-tools"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('permissions.destroy', $permission->id) }}" id="form-{{ $permission->id }}" method="post">
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
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{ $permissions->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
