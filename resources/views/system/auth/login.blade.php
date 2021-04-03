<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <base href="{{asset('/')}}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gerenciador de Projetos</title>
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        @livewireStyles
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />


    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 ">
                <div class="col-12 align-self-center">
                    <div class="auth-page">
                        <div class="card auth-card shadow-lg">
                            <div class="card-body">
                                <div class="px-3">
                              
                                    
                                    <div class="text-center auth-logo-text">
                                        <h4 class="mt-0 mb-3 mt-5">Vamos usar o Gerenciador De Projetos</h4>
                                        <p class="text-muted mb-0">Faça login com sua conta</p>  
                                    </div> <!--end auth-logo-text-->  
    
                                    <livewire:login-form/>     

                                </div><!--end /div-->
                                
                                <div class="m-3 text-center text-muted">
                                    <p class="">Não tem uma conta ? <a href="auth/registrar" class="text-primary ml-2">Clique aqui para criar</a></p>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    
                    </div><!--end auth-page-->
                </div><!--end col-->           
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        


       
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/metismenu.min.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('plugins/apexcharts/apexcharts.min.js')}}"></script> 
        <script src="{{asset('assets/pages/jquery.projects-index.init.js')}}"></script>
        @livewireScripts
        <script src="{{asset('assets/js/app.js')}}"></script>
        
    </body>

</html>