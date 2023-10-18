@extends('layouts.app', ['page' => 'Dispositivos', 'pageSlug' => 'devices'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Cadastrar Dispositivo</h3>
                        </div>

                        <div class="col-4 text-right">
                            <a href="{{ route('devices.index') }}" class="btn btn-sm btn-primary">Volta</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('devices._form')
                </div>
            </div>
        </div>
    </div>
@endsection
