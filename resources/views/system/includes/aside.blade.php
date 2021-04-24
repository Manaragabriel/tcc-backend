<div class="leftbar-tab-menu">
            <div class="main-icon-menu">
                <a href="../projects/projects-index.html" class="logo logo-metrica d-block text-center">
                    <span>
                       <!-- <img src="../assets/images/logo-sm.png" alt="logo-small" class="logo-sm"> -->
                    </span>
                </a>
                <nav class="nav">
                    <a href="#MetricaProject" class="nav-link {{ $organization_menu ? '':'active' }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Seu Perfil" data-trigger="hover">
                        <i data-feather="user" class="align-self-center menu-icon icon-dual"></i>
                    </a><!--end MetricaProject--> 

                    <a href="#MetricaApps" class="nav-link {{ $organization_menu ? 'active':'' }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Organização" data-trigger="hover">
                        <i data-feather="grid" class="align-self-center menu-icon icon-dual"></i>
                    </a><!--end MetricaApps-->

                
                </nav><!--end nav-->
              
            </div><!--end main-icon-menu-->

            <div class="main-menu-inner">
                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="../projects/projects-index.html" class="logo h6 menu-title">
                       {{$organization_name}}
                    </a>
                </div>
                <!--end logo-->
                <div class="menu-body slimscroll">                    
                    <div id="MetricaProject" class="main-icon-menu-pane  {{ $organization_menu ? '':'active' }}">
                        <div class="title-box">
                            <h6 class="menu-title">Seu Perfil</h6>       
                        </div>
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link" href="/painel">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('painel/organizacoes')}}">Suas Organizações</a></li>
                            <li class="nav-item"><a class="nav-link" href="/painel/suas-equipes">Suas Equipes</a></li>
                            <li class="nav-item"><a class="nav-link" href="/painel/suas-tarefas">Suas Tarefas</a></li>
                            <li class="nav-item"><a class="nav-link" href="/painel/seus-convites">Seus Convites</a></li>
                            <li class="nav-item"><a class="nav-link" href="/painel/configuracoes">Configurações de Perfil</a></li>
                        </ul>
                    </div><!-- end Project -->     

                    <div id="MetricaApps" class="main-icon-menu-pane {{ $organization_menu ? 'active':'' }}">
                        <div class="title-box">
                            <h6 class="menu-title">MENU</h6>
                        </div>
                        <ul class="nav metismenu">
                            <li class="nav-item"><a class="nav-link" href="/painel/{{request()->slug}}/projetos">Projetos</a></li>
                            @if($user_type != 2)
                                <li class="nav-item"><a class="nav-link" href="/painel/{{request()->slug}}/chamados">Chamados</a></li>
                            @endif
                            <li class="nav-item"><a class="nav-link" href="/painel/{{request()->slug}}/seus-chamados">Seus Chamados</a></li>
                            @if($user_type != 2)
                                <li class="nav-item"><a class="nav-link" href="/painel/{{request()->slug}}/equipes">Equipes</a></li>
                            @endif
                            @if($user_type != 2)
                                <li class="nav-item"><a class="nav-link" href="/painel/{{request()->slug}}/membros">Membros</a></li>
                            @endif
                        </ul>
                    </div><!-- end Crypto -->
                    
                
                </div>
            </div>
        </div>