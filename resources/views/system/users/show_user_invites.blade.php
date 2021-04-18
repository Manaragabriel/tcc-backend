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
                                        <li class="breadcrumb-item active">Seus convites</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Convites de organizações</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h5 class="mt-0">Lista com convites para participar de organizações
                                </li>
                            </ul>
                        </div><!--end col-->

                        <div class="col-lg-6 text-right">
                            <div class="text-right">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <div class="input-group">                               
                                            <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Pesquisar">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-gradient-primary"><i class="fas fa-search"></i></button>
                                            </span>
                                        </div>
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
                                            
                                        </div> 
                                        <div class="text-center project-card">
                                            <img src="../assets/images/widgets/p-1.svg" alt="" height="80" class="mx-auto d-block mb-3"> 
                       
                                            <a class="project-title h3 " href="/painel/{{ $organization->slug}}">{{ $organization->name}}</a>
                                            <p class="text-muted"><span class="text-secondary font-14">
                                               
                                            </p>
                                           
                                            <a type="button" class="btn btn-gradient-secondary" href="/painel/seus-convites/recusar/{{$organization->invites[0]->pivot->id}}">Recusar</a>
                                            <a type="button" class="btn btn-gradient-primary" href="/painel/seus-convites/aceitar/{{$organization->invites[0]->pivot->id}}">Aceitar</a>
                                              
                                        </div>                                                                      
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->

                        @endforeach

             
                    </div><!--end row-->



                </div>
@endsection