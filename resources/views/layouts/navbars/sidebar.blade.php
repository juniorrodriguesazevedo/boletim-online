<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <a href="" class="simple-text logo-normal">TANCREDO NEVES</a>
        </div>
        <ul class="nav">

            <li @if ($pageSlug == 'consultation-forms') class="active " @endif>
                <a href="">
                    <i class="fa fa-ambulance"></i>
                    <p>Consultas</p>
                </a>
            </li>

            <li @if ($pageSlug == 'patients') class="active " @endif>
                <a href="">
                    <i class="fa fa-address-card"></i>
                    <p>Pacientes</p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#collapseInformacao" aria-expanded="false" class="collapsed">
                    <i class="fa fa-heartbeat"></i>
                    <span class="nav-link-text">Info. Clínicas</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="collapseInformacao" style="">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'cbos') class="active" @endif>
                            <a href="">
                                <i class="fa fa-th-list"></i>
                                <p>CBOs</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'cids') class="active" @endif>
                            <a href="">
                                <i class="fa fa-th-list"></i>
                                <p>CIDs</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'services') class="active" @endif>
                            <a href="">
                                <i class="fa fa-th-list"></i>
                                <p>Serviços</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'classifications') class="active" @endif>
                            <a href="">
                                <i class="fa fa-th-list"></i>
                                <p>Classificações</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'procedures') class="active" @endif>
                            <a href="">
                                <i class="fa fa-medkit"></i>
                                <p>Procedimentos</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li @if ($pageSlug == 'tickets') class="active " @endif>
                <a href="">
                    <i class="fa fa-envelope"></i>
                    <p>Suporte</p>
                </a>
            </li>

          {{--   <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text">{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{--             <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Icons') }}</p>
                </a>
            </li> --}}

            @if (auth()->check() &&
                    auth()->user()->hasRole(['director', 'super_admin']))
                <li>
                    <a data-toggle="collapse" href="#collapseGerenciamento" aria-expanded="false" class="collapsed">
                        <i class="fa fa-cogs"></i>
                        <span class="nav-link-text">Gerenciamento</span>
                        <b class="caret mt-1"></b>
                    </a>
                    <div class="collapse" id="collapseGerenciamento" style="">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'users') class="active " @endif>
                                <a href="{{ route('users.index') }}">
                                    <i class="fas fa-users"></i>
                                    <p>Usuários</p>
                                </a>
                            </li>

                            <li @if ($pageSlug == 'activities') class="active " @endif>
                                <a href="{{ route('activities.index') }}">
                                    <i class="fa fa-history"></i>
                                    <p>Histórico</p>
                                </a>
                            </li>

                            @if (auth()->check() &&
                                    auth()->user()->hasRole('super_admin'))
                                <li @if ($pageSlug == 'roles') class="active " @endif>
                                    <a href="{{ route('roles.index') }}">
                                        <i class="fas fa-user-lock"></i>
                                        <p>Funções</p>
                                    </a>
                                </li>

                                <li @if ($pageSlug == 'permissions') class="active " @endif>
                                    <a href="{{ route('permissions.index') }}">
                                        <i class="fas fa-lock"></i>
                                        <p>Permissões</p>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif

        </ul>
    </div>
</div>
