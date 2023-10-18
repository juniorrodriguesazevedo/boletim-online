@extends('layouts.app', ['page' => 'Usuário', 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Vizualizar Usuário</h3>
                        </div>

                        <div class="col-4 text-right">
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">Volta</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Nome: </strong></p>
                                <p class="card-text">
                                    {{ $user->name }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>CPF: </strong></p>
                                <p class="card-text">
                                    {{ $user->cpf ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>RG: </strong></p>
                                <p class="card-text">
                                    {{ $user->rg ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Cartão Nacinal de Saúde (CNS): </strong></p>
                                <p class="card-text">
                                    {{ $user->cns ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Data de Nascimento: </strong></p>
                                <p class="card-text">
                                    {{ $user->birth_date ? formatDate($user->birth_date) : 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Sexo: </strong></p>
                                <p class="card-text">
                                    {{ $user->sex == 'M' ? 'Masculino' : 'Feminino' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Cor/Raça: </strong></p>
                                <p class="card-text">
                                    {{ $user->color ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Naturalidade: </strong></p>
                                <p class="card-text">
                                    {{ $user->naturalness ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Telefone: </strong></p>
                                <p class="card-text">
                                    {{ $user->phone ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>CBO: </strong></p>
                                <p class="card-text">
                                    {{ $user->cbo->name ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Função: </strong></p>
                                <p class="card-text">
                                    {{ getRole($user->roles) }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Status: </strong></p>
                                <p class="card-text">
                                    {!! status($user->status) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
