@extends('layouts.app', ['page' => 'Usuários', 'pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">Usuários</h3>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Adicionar Novo</a>
                    </div>
                </div>
                {!! Form::open(['route' => 'users.index' ,'method' => 'get']) !!}
                <div class="row align-items-center">
                    <div class="col-5">
                        {!! Form::text('search', request('search') ,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-5">
                        {!! Form::submit('Pesquisar', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <caption><strong>N. Registros: {{ $users->count() }}</strong></caption>
                      <thead class="text-primary">
                        <tr>
                          <th scope="col">Nome</th>
                          <th scope="col">Email</th>
                          <th scope="col">Função</th>
                          <th scope="col">Status</th>
                          <th scope="col" style="width: 84px">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles[0]->description ?? 'Sem função' }}</td>
                                <td>{!! status($user->status) !!}</td>
                                <td class="btn-toolbar">
                                    <div class="btn-group mr-1">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm btn-round btn-icon">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-1">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm btn-round btn-icon">
                                            <i class="fas fa-tools"></i>
                                        </a>
                                    </div>
                                   {{--  <div class="btn-group">
                                        <form action="{{ route('users.destroy', $user->id) }}" id="form-{{ $user->id }}" method="post">
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
                    {{ $users->appends(request()->all())->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
