@extends('system/layout')

@section('content')
<div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                       
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Painel</a></li>
                                        <li class="breadcrumb-item active">Suas organizações</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Suas Organizações</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h5 class="mt-0">Lista com todas as suas organizações
                                </li>
                            </ul>
                        </div><!--end col-->

                        <div class="col-lg-6 text-right">
                            <div class="text-right">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <div class="input-group">                               
                                            <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-gradient-primary"><i class="fas fa-search"></i></button>
                                            </span>
                                        </div>
                                    </li>
                                   
                                    <li class="list-inline-item">
                                        <a type="button" class="btn btn-gradient-primary" href="{{asset('painel/organizacoes/criar')}}">Criar uma organização</a>
                                    </li>
                                </ul>
                            </div>                            
                        </div><!--end col-->
                    </div><!--end row-->
                    
                    <div class="row">
                        @foreach($organizations as $organization)
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">                                        
                                        <div class=" d-flex justify-content-end">                                        
                                            <div class="dropdown d-inline-block">
                                                <a class="nav-link dropdown-toggle arrow-none" id="dLabel1" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel1">
                                                    <a class="dropdown-item" href="{{asset('painel/organizacoes/editar/'.$organization->id)}}">Editar</a> 
                                                    <form action="/painel/organizacoes/{{$organization->id }}" method="POST">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <button class="dropdown-item btn"  type="submit">Deletar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="text-center project-card">
                                            <img src="../assets/images/widgets/p-1.svg" alt="" height="80" class="mx-auto d-block mb-3"> 
                       
                                            <h3 class="project-title ">{{$organization->name}}</h3>
                                            <p class="text-muted"><span class="text-secondary font-14"><b>Description :</b></span>There are many variations of passages of 
                                                Lorem Ipsum available, but the majority have suffered alteration in some form.
                                            </p>
                                            <a href="" class="text-info">www.xyz.marketechworld.com</a>
                                            <h4>52/90</h4>
                                            <p class="text-muted">Task Complete</p>
                                            <div class="img-group">
                                                <a class="user-avatar user-avatar-group" href="#">
                                                    <img src="../assets/images/users/user-6.jpg" alt="user" class="rounded-circle thumb-xs">
                                                </a>
                                                <a class="user-avatar user-avatar-group" href="#">
                                                    <img src="../assets/images/users/user-2.jpg" alt="user" class="rounded-circle thumb-xs">
                                                </a>
                                                <a class="user-avatar user-avatar-group" href="#">
                                                    <img src="../assets/images/users/user-3.jpg" alt="user" class="rounded-circle thumb-xs">
                                                </a>
                                                <a class="user-avatar user-avatar-group" href="#">
                                                    <img src="../assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-xs">
                                                </a>
                                                <a href="" class="avatar-box thumb-xs align-self-center">
                                                    <span class="avatar-title bg-soft-info rounded-circle font-13 font-weight-normal">+25</span>
                                                </a>
            
                                            </div><!--end img-group-->        
                                        </div>                                                                      
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->

                        @endforeach

             
                    </div><!--end row-->



                </div>
@endsection