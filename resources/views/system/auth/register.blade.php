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
                                        <p class="text-muted mb-0">Preencha os campos para criar sua conta</p>  
                                    </div> <!--end auth-logo-text-->  
    
                                    
                                    <form class="form-horizontal auth-form my-4" action="auth/do_register" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="username">Seu nome completo*</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-user"></i> 
                                                </span>                                                                                                              
                                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Digite seu nome completo">
                                            </div>  
                                            @if($errors->any())
                                                <div class="text-danger">{{$errors->first('name')}}</div> 
                                            @endif                              
                                        </div><!--end form-group--> 
    
                                        <div class="form-group">
                                            <label for="useremail">Email*</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-mail"></i> 
                                                </span>                                                                                                              
                                                <input type="email" class="form-control"   value="{{old('email')}}"  name="email" id="email" placeholder="Digite seu e-mail">
                                            </div>   
                                            @if($errors->any())
                                                <div class="text-danger">{{$errors->first('email')}}</div> 
                                            @endif                                  
                                        </div><!--end form-group-->
            
                                        <div class="form-group">
                                            <label for="userpassword">Senha*</label>                                            
                                            <div class="input-group mb-3"> 
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock"></i> 
                                                </span>                                                       
                                                <input type="password" class="form-control"  value="{{old('password')}}"  name="password" id="senha" placeholder="Digite sua senha">
                                            </div>   
                                            @if($errors->any())
                                                <div class="text-danger">{{$errors->first('password')}}</div> 
                                            @endif                             
                                        </div><!--end form-group--> 
    
                                        <div class="form-group">
                                            <label for="conf_password">Confirmar Senha*</label>                                            
                                            <div class="input-group mb-3"> 
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock-open"></i> 
                                                </span>                                                       
                                                <input type="password" class="form-control"  value="{{old('password_confirmation')}}"  name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha">
                                            </div>  
                                            @if($errors->any())
                                                <div class="text-danger">{{$errors->first('password_confirmation')}}</div> 
                                            @endif 
                                            <div class="form-group">
                                                <label for="mo_number">Telefone*</label>                                            
                                                <div class="input-group mb-3"> 
                                                    <span class="auth-form-icon">
                                                        <i class="dripicons-phone"></i> 
                                                    </span>                                                       
                                                    <input type="text" class="form-control phone"  value="{{old('phone')}}"  name="phone" id="phone" placeholder="Digite seu telefone*">
                                                </div>                               
                                            </div><!--end form-group--> 
                                            @if($errors->any())
                                                <div class="text-danger">{{$errors->first('phone')}}</div> 
                                            @endif 
                                        </div><!--end form-group--> 
            
                                        <div class="form-group">
                                                <label for="mo_number">CPF*</label>                                            
                                                <div class="input-group mb-3"> 
                                                    <span class="auth-form-icon">
                                                        <i class="dripicons-phone"></i> 
                                                    </span>                                                       
                                                    <input type="text" class="form-control cpf"  value="{{old('cpf')}}"  name="cpf" id="cpf" placeholder="Digite seu CPF*">
                                                </div>                               
                                            </div><!--end form-group-->
                                            @if($errors->any())
                                                <div class="text-danger">{{$errors->first('cpf')}}</div> 
                                            @endif  
                                        </div><!--end form-group--> 
            
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Registrar-se <i class="fas fa-sign-in-alt ml-1"></i></button>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                </div><!--end /div-->
                                
                                <div class="m-3 text-center text-muted">
                                    <p class="">Já tem uma conta ? <a href="auth/login" class="text-primary ml-2">Faça Login</a></p>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end auth-card-->
                </div><!--end col-->           
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        


        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/metismenu.min.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('plugins/apexcharts/apexcharts.min.js')}}"></script> 
        <script src="{{asset('assets/pages/jquery.projects-index.init.js')}}"></script>
        <script src="{{asset('assets/js/jquery.mask.min.js')}}"></script>
        <script src="{{asset('assets/js/masks.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        
    </body>

</html>