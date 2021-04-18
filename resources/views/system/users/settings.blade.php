@extends('system/layout')
@section('content')
<div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Sistema</a></li>
                                        <li class="breadcrumb-item active">Configurações de perfil</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Configurações do seu perfil!</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">        
                                    
                                 <form method="POST" action="/painel/configuracoes/update" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="id" value="{{$user->id}}" />
                                    <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group ">
                                                    <label for="name" class="col-form-label">Seu nome*</label>
                                                    
                                                    <input class="form-control" name="name" type="text" value="{{old('name') ? old('name') : $user->name}}" id="name">
                                                    @error('name')
                                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cnpj" class="col-form-label">Seu CPF *</label>
                                                    
                                                    <input class="form-control" name="cpf" type="text" value="{{old('cpf') ? old('cpf') : $user->cpf }}" id="cpf">
                                                    @error('cpf')
                                                        <span class="text-danger">{{$errors->first('cpf')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label for="avatar" class="col-form-label text-right">Trocar avatar*</label>
                                                    <div>
                                                        <input class="form-control" type="file" name="avatar" id="avatar">
                                                    </div>
                                                    @error('avatar')
                                                        <span class="text-danger">{{$errors->first('avatar')}}</span>
                                                    @enderror
                                                </div> 
                                                <div class="form-group ">
                                                    <label for="phone" class="col-form-label">Seu telefone *</label>
                                                    
                                                    <input class="form-control" name="phone" type="text" value="{{old('phone') ? old('phone') : $user->phone }}" id="phone">
                                                    @error('phone')
                                                        <span class="text-danger">{{$errors->first('phone')}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group text-right">
                                                    <div class="col-3">
                                                        <input type="submit" class="form-control w-50" value="Enviar">

                                                    </div>
                                                </div>
                                            
                                                                            
                                            </div>

                                        </div>  
                                 
                                 </form>                                                                    
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->

                  

                

                        

                </div>


@endsection