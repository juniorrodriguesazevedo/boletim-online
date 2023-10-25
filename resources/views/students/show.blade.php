@extends('layouts.app', ['page' => 'Alunos', 'pageSlug' => 'students'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Vizualizar Aluno</h3>
                        </div>

                        <div class="col-4 text-right">
                            <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary">Volta</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Nome: </strong></p>
                                <p class="card-text">
                                    {{ $student->name }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Data Nascimento: </strong></p>
                                <p class="card-text">
                                    {{ $student->birth_date }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Sexo: </strong></p>
                                <p class="card-text">
                                    {{ $student->sex == 'M' ? 'Masculino' : 'Feminino' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Status: </strong></p>
                                <p class="card-text">
                                    {!! status($student->status) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>CPF: </strong></p>
                                <p class="card-text">
                                    {{ $student->cpf ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>RG: </strong></p>
                                <p class="card-text">
                                    {{ $student->rg ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Certidão Nascimento: </strong></p>
                                <p class="card-text">
                                    {{ $student->birth_certificate ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Nome da Mãe: </strong></p>
                                <p class="card-text">
                                    {{ $student->name_mother ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Nome do Pai: </strong></p>
                                <p class="card-text">
                                    {{ $student->name_father ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Telefone Responsável: </strong></p>
                                <p class="card-text">
                                    {{ $student->phone_first }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Telefone Secundário: </strong></p>
                                <p class="card-text">
                                    {{ $student->phone_second ?? 'NÃO INFORMADO' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Rua: </strong></p>
                                <p class="card-text">
                                    {{ $student->street }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Número: </strong></p>
                                <p class="card-text">
                                    {{ $student->number }}
                                </p>
                            </div>
                        </div>
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Bairro: </strong></p>
                                <p class="card-text">
                                    {{ $student->district }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card m-2 shadow-sm">
                            <div class="card-body">
                                <p><strong>Observação sobre o aluno: </strong></p>
                                <p class="card-text">
                                    {{ $student->observation ?? 'SEM OBSERVAÇÃO' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
