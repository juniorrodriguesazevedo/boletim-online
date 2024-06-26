@extends('layouts.app', ['page' => 'Alunos', 'pageSlug' => 'students'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Editar Aluno</h3>
                        </div>

                        <div class="col-4 text-right">
                            <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary">Volta</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('students._form')
                </div>
            </div>
        </div>
    </div>
@endsection

@include('uteis.mask')
