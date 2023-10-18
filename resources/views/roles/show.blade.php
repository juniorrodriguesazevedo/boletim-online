@extends('layouts.app', ['page' => 'Atribuicoes', 'pageSlug' => 'roles'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">Vizualizar Atribuição</h3>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">Volta</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-deck">
                    <div class="card m-2 shadow-sm">
                        <div class="card-body">
                            <p><strong>Nome: </strong></p>
                            <p class="card-text">
                                {{ $role->name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card m-2 shadow-sm">
                <div class="card-body">
                    <p><strong>Permissões: </strong></p>
                    <p class="card-text">
                        @foreach ($permissions as $permission)
                            <li>{{ $permission->name }}</li>
                        @endforeach
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
