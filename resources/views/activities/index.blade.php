@extends('layouts.app', ['page' => 'Histórico de Atividades', 'pageSlug' => 'activities'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Histórico de Atividades</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <caption><strong>N. Registros: {{ $activities->count() }}</strong></caption>
                        <thead class="text-primary">
                            <tr>
                                <th scope="col">Usuário</th>
                                <th scope="col">Página</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Data</th>
                                <th scope="col">Horas</th>
                                <th scope="col" style="width: 50px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td>{{ $activity->user }}</td>
                                    <td>{{ $activity->log_name }}</td>
                                    <td>{{ getEvent($activity->event) }}</td>
                                    <td>{{ date("d/m/Y", strtotime($activity->created_at)) }}</td>
                                    <td>{{ date("H:i", strtotime($activity->created_at)) }}</td>
                                    <td class="btn-toolbar">
                                        <div class="btn-group mr-1">
                                            <a href="{{ route('activities.show', $activity->id) }}"
                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-start" aria-label="...">
                        {{ $activities->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
