@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profiles'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Editar Perfil</h5>
                </div>
                    <div class="card-body">
                        @include('profiles._form')
                    </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title">Senha</h5>
                </div>
                <form method="post" action="" autocomplete="off">
                    <div class="card-body">
                        @include('profiles._password_form')
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                @if (auth()->user()->sex == 'M')
                                    <div class="photo">
                                        <img class="avatar" src="{{ asset('white/img/anime3.png') }}" alt="Foto de perfil">
                                    </div>
                                @else
                                    <div class="photo">
                                        <img class="avatar" src="{{ asset('white/img/anime6.png') }}" alt="Foto de perfil">
                                    </div>
                                @endif
                                <h5 class="title">{{ auth()->user()->name }}</h5>
                            </a>
                            {{-- <p class="description">
                                {{ _('Ceo/Co-Founder') }}
                            </p> --}}
                        </div>
                    </p>
                    {{-- <div class="card-description">
                        {{ _('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                    </div> --}}
                </div>
               {{--  <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
