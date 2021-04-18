<div class="leftbar-tab-menu">
            <div class="main-icon-menu">
                <a href="../projects/projects-index.html" class="logo logo-metrica d-block text-center">
                    <span>
                        <img src="../assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
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
                <div class="pro-metrica-end">
                    <a href="" class="help" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Chat">
                        <i data-feather="message-circle" class="align-self-center menu-icon icon-md icon-dual mb-4"></i> 
                    </a>
                    <a href="" class="profile">
                        <img src="../assets/images/users/user-4.jpg" alt="profile-user" class="rounded-circle thumb-sm"> 
                    </a>
                </div>
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
                            <li class="nav-item"><a class="nav-link" href="../projects/projects-index.html">Dashboard</a></li>
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
                    
                    <div id="MetricaUikit" class="main-icon-menu-pane">
                        <div class="title-box">
                            <h6 class="menu-title">UI Kit</h6>      
                        </div>
                        <ul class="nav metismenu">                                
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="w-100">UI Elements</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="../others/ui-bootstrap.html">Bootstrap</a></li>
                                    <li><a href="../others/ui-animation.html">Animation</a></li>
                                    <li><a href="../others/ui-avatar.html">Avatar</a></li>
                                    <li><a href="../others/ui-clipboard.html">Clip Board</a></li>
                                    <li><a href="../others/ui-files.html">File Manager</a></li>
                                    <li><a href="../others/ui-ribbons.html">Ribbons</a></li>
                                    <li><a href="../others/ui-dragula.html">Dragula</a></li>
                                    <li><a href="../others/ui-check-radio.html">Check & Radio</a></li>
                                </ul>            
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="w-100">Advanced UI</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="../others/advanced-rangeslider.html">Range Slider</a></li>
                                    <li><a href="../others/advanced-sweetalerts.html">Sweet Alerts</a></li>
                                    <li><a href="../others/advanced-nestable.html">Nestable List</a></li>
                                    <li><a href="../others/advanced-ratings.html">Ratings</a></li>
                                    <li><a href="../others/advanced-highlight.html">Highlight</a></li>
                                    <li><a href="../others/advanced-session.html">Session Timeout</a></li>
                                    <li><a href="../others/advanced-idle-timer.html">Idle Timer</a></li>
                                </ul>            
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="w-100">Forms</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="../others/forms-elements.html">Basic Elements</a></li>
                                    <li><a href="../others/forms-advanced.html">Advance Elements</a></li>
                                    <li><a href="../others/forms-validation.html">Validation</a></li>
                                    <li><a href="../others/forms-wizard.html">Wizard</a></li>
                                    <li><a href="../others/forms-editors.html">Editors</a></li>
                                    <li><a href="../others/forms-repeater.html">Repeater</a></li>
                                    <li><a href="../others/forms-x-editable.html">X Editable</a></li>
                                    <li><a href="../others/forms-uploads.html">File Upload</a></li>
                                    <li><a href="../others/forms-img-crop.html">Image Crop</a></li>
                                </ul>            
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="w-100">Charts</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="../others/charts-apex.html">Apex</a></li>
                                    <li><a href="../others/charts-morris.html">Morris</a></li>
                                    <li><a href="../others/charts-chartist.html">Chartist</a></li>
                                    <li><a href="../others/charts-flot.html">Flot</a></li>
                                    <li><a href="../others/charts-peity.html">Peity</a></li>
                                    <li><a href="../others/charts-chartjs.html">Chartjs</a></li>
                                    <li><a href="../others/charts-sparkline.html">Sparkline</a></li>
                                    <li><a href="../others/charts-knob.html">Jquery Knob</a></li>
                                    <li><a href="../others/charts-justgage.html">JustGage</a></li>
                                </ul>            
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="w-100">Tables</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="../others/tables-basic.html">Basic</a></li>
                                    <li><a href="../others/tables-datatable.html">Datatables</a></li>
                                    <li><a href="../others/tables-responsive.html">Responsive</a></li>
                                    <li><a href="../others/tables-footable.html">Footable</a></li>
                                    <li><a href="../others/tables-jsgrid.html">Jsgrid</a></li>
                                    <li><a href="../others/tables-dragger.html">Dragger</a></li>
                                    <li><a href="../others/tables-editable.html">Editable</a></li>
                                </ul>            
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="w-100">Icons</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="../others/icons-materialdesign.html">Material Design</a></li>
                                    <li><a href="../others/icons-dripicons.html">Dripicons</a></li>
                                    <li><a href="../others/icons-fontawesome.html">Font awesome</a></li>
                                    <li><a href="../others/icons-themify.html">Themify</a></li>
                                    <li><a href="../others/icons-feather.html">Feather</a></li>
                                    <li><a href="../others/icons-typicons.html">Typicons</a></li>
                                    <li><a href="../others/icons-emoji.html">Emoji <i class="em em-ok_hand"></i></a></li>
                                </ul>            
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="w-100">Maps</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="../others/maps-google.html">Google Maps</a></li>
                                    <li><a href="../others/maps-leaflet.html">Leaflet Maps</a></li>
                                    <li><a href="../others/maps-vector.html">Vector Maps</a></li>       
                                </ul>            
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="w-100">Email Templates</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="../others/email-templates-basic.html">Basic Action Email</a></li>
                                    <li><a href="../others/email-templates-alert.html">Alert Email</a></li>
                                    <li><a href="../others/email-templates-billing.html">Billing Email</a></li>         
                                </ul>            
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!-- end Others -->

                    <div id="MetricaPages" class="main-icon-menu-pane">
                        <div class="title-box">
                            <h6 class="menu-title">Pages</h6>        
                        </div>
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link" href="../pages/pages-profile.html">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/pages-tour.html">Tour</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/pages-timeline.html">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/pages-treeview.html">Treeview</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/pages-starter.html">Starter Page</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/pages-pricing.html">Pricing</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/pages-blogs.html">Blogs</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/pages-faq.html">FAQs</a></li>
                            <li class="nav-item"><a class="nav-link" href="../pages/pages-gallery.html">Gallery</a></li>
                        </ul>
                    </div><!-- end Pages -->
                    <div id="MetricaAuthentication" class="main-icon-menu-pane">
                        <div class="title-box">
                            <h6 class="menu-title">Authentication</h6>     
                        </div>
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-login.html">Log in</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-login-alt.html">Log in alt</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-register.html">Register</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-register-alt.html">Register-alt</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-recover-pw.html">Re-Password</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-recover-pw-alt.html">Re-Password-alt</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-lock-screen.html">Lock Screen</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-lock-screen-alt.html">Lock Screen</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-404.html">Error 404</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-404-alt.html">Error 404-alt</a></li>
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-500.html">Error 500</a></li>                            
                            <li class="nav-item"><a class="nav-link" href="../authentication/auth-500-alt.html">Error 500-alt</a></li>
                        </ul>
                    </div><!-- end Authentication-->
                </div><!--end menu-body-->
            </div><!-- end main-menu-inner-->
        </div>