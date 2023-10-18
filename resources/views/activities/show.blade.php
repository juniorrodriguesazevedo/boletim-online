@extends('layouts.app', ['page' => 'Histórico de Atividade', 'pageSlug' => 'activities'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Histórico de Atividade</h3>
                        </div>

                        <div class="col-4 text-right">
                            <a href="{{ route('activities.index') }}" class="btn btn-sm btn-primary">Volta</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Usuário: </strong></p>
                                <p class="card-text">
                                    {{ $activity->user }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Página: </strong></p>
                                <p class="card-text">
                                    {{ $activity->log_name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Tipo: </strong></p>
                                <p class="card-text">
                                    {{ getEvent($activity->event) }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Data: </strong></p>
                                <p class="card-text">
                                    {{ date('d/m/Y', strtotime($activity->created_at)) }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Hora: </strong></p>
                                <p class="card-text">
                                    {{ date('H:i', strtotime($activity->created_at)) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body row">
                    @isset($olds)
                        <div class="col">
                            <div class="card-header">
                                <strong>Antes</strong>
                            </div>
                            <div class="card-body">
                                <ul>
                                    @foreach ($olds as $key => $old)
                                        <li><strong>{{ $key }}:</strong> {{ $old ?? 'NÃO INFORMADO' }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endisset
                    <div class="col">
                        <div class="card-header">
                            <strong>{{ isset($olds) ? 'Depois' : 'Campos' }}</strong>
                        </div>
                        <div class="card-body">
                            <ul>
                                @isset($attributes )
                                    @foreach ($attributes as $key => $attribute)
                                        <li><strong>{{ $key }}:</strong> {{ $attribute ?? 'NÃO INFORMADO' }}</li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
