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
                                        <li class="breadcrumb-item active">Suas equipes</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Suas Equipes</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h5 class="mt-0">Lista com todas as equipes de {{$organization_name}}
                                </li>
                            </ul>
                        </div><!--end col-->

                        <div class="col-lg-6 text-right">
                            <div class="text-right">
                                <ul class="list-inline">
                                    <li class="list-inline-item mr-0">
                                        <div class="input-group">                               
                                            <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Pesquisar">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-gradient-primary"><i class="fas fa-search"></i></button>
                                            </span>
                                        </div>
                                    </li>
                                   
                                    <li class="list-inline-item">
                                        <a type="button" class="btn btn-gradient-primary mt-2 mt-lg-0" href="{{url()->current()}}/criar">Criar uma equipe</a>
                                    </li>
                                </ul>
                            </div>                            
                        </div><!--end col-->
                    </div><!--end row-->
                    
                    <div class="row">
                        @foreach($teams as $team)
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">                                        
                                        <div class=" d-flex justify-content-end">                                        
                                            <div class="dropdown d-inline-block">
                                                <a class="nav-link dropdown-toggle arrow-none" id="dLabel1" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel1">
                                                    <a class="dropdown-item" href="{{url()->current()}}/editar/{{$team->id}}">Editar</a> 
                                                    <form action="{{url()->current()}}/{{$team->id }}" method="POST">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <button class="dropdown-item btn"  type="submit">Deletar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="text-center project-card">
                                            <img src="/storage/teams/{{$team->image}}" alt="" height="80" class="mx-auto d-block mb-3"> 
                       
                                            <a class="project-title h3 " href="/painel/{{$team->slug}}">{{$team->name}}</a>
                                            <p class="text-muted"><span class="text-secondary font-14">
                                               
                                            </p>
                                            <a type="button" class="btn btn-gradient-primary" href="/painel/{{request()->slug}}/equipes/{{$team->slug}}/membros">Ver equipe</a>

                                              
                                        </div>                                                                      
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->

                        @endforeach

             
                    </div><!--end row-->



                </div>
@endsection