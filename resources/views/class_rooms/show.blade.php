@extends('layouts.app', ['page' => 'Dispositivo', 'pageSlug' => 'devices'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Vizualizar Dispositivo</h3>
                        </div>

                        <div class="col-4 text-right">
                            <a href="{{ route('devices.index') }}" class="btn btn-sm btn-primary">Volta</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Nome: </strong></p>
                                <p class="card-text">
                                    {{ $device->name }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>IP: </strong></p>
                                <p class="card-text">
                                    {{ $device->ip }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Status: </strong></p>
                                <p class="card-text">
                                    {!! status($device->status) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
