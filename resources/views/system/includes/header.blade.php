<div class="topbar">           
            <!-- Navbar -->
            <nav class="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-right mb-0"> 
                

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="../assets/images/users/user-4.jpg" alt="profile-user" class="rounded-circle" /> 
                            <span class="ml-1 nav-user-name hidden-sm">{{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted mr-2"></i> Configurações</a>
                            <a class="dropdown-item" href="/auth/logout"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
               
                </ul><!--end topbar-nav-->
    
                <ul class="list-unstyled topbar-nav mb-0">  
                    <li>
                        <a href="../projects/projects-index.html">
                            <span class="responsive-logo">
                                <img src="../assets/images/logo-sm.png" alt="logo-small" class="logo-sm align-self-center" height="34">
                            </span>
                        </a>                        
                    </li>                      
                    <li>
                        <button class="button-menu-mobile nav-link">
                            <i data-feather="menu" class="align-self-center"></i>
                        </button>
                    </li>
                  
                 
                </ul>
            </nav>
            <!-- end navbar-->
        </div>