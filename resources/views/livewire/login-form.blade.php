<form class="form-horizontal auth-form my-4" action="index.html">
            
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group mb-3">
                <span class="auth-form-icon">
                    <i class="dripicons-user"></i> 
                </span>                                                                                                              
                <input type="email" class="form-control" wire:model.defer="email" id="email" placeholder="Digite seu e-mail">
            </div>                                    
        </div><!--end form-group--> 
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        <div class="form-group">
            <label for="userpassword">Senha</label>                                            
            <div class="input-group mb-3"> 
                <span class="auth-form-icon">
                    <i class="dripicons-lock"></i> 
                </span>                                                       
                <input type="password" class="form-control" wire:model.defer="password" id="password" placeholder="Digite sua senha">
            </div>                               
        </div><!--end form-group--> 
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror

        <div class="form-group row mt-4">
    
            <div class="col-sm-12 text-right">
                <a href="auth-recover-pw.html" class="text-muted font-13"><i class="dripicons-lock"></i> Esqueceu sua senha?</a>                                    
            </div><!--end col--> 
        </div><!--end form-group--> 

        @if(!empty($errorMessage))
            <span class="text-danger">{{$errorMessage}}</span>

        @endif
        <div class="form-group mb-0 row">
            <div class="col-12 mt-2">
                <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" wire:click="login" type="button">Enviar <i class="fas fa-sign-in-alt ml-1"></i></button>
            </div><!--end col--> 
        </div> <!--end form-group-->                           
</form><!--end form-->