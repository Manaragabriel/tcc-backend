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
                                        <li class="breadcrumb-item active">Seus chamados</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Seus chamados</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h5 class="mt-0">Lista com todos os chamados
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
                                   
                                    <li class="list-inline-item">
                                        <a type="button" class="btn btn-gradient-primary" href="{{asset('painel/'.request()->slug.'/chamados/criar')}}">Criar um chamado</a>
                                    </li>
                                </ul>
                            </div>                            
                        </div><!--end col-->
                    </div><!--end row-->
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>ID do chamado</th>
                                                    <th>Titulo</th>
                                                    <th>Descrição</th>
                                                    <th>Tipo</th>
                                                    <th>Ação</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($calls as $call)
                                                <tr>
                                                    <td>{{$call->id}}</td>
                                                
                                                    <td>{{$call->title}}</td>
                                                    <td>{{$call->description}}</td>
                                                    <td><span class="badge badge-md badge-boxed  badge-soft-success">{{$call->type}}</span></td>
                                                    <td>
                                                        <button class="btn btn-primary">Visualizar</button>
                                                    </td>
                                                </tr>
                                                @endforeach                                                 
                                            </tbody>
                                        </table>
                                        <div class="text-right">
                                        </div>                                                
                                    </div>
                                </div>
                            </div>
                        </div>

             
                    </div><!--end row-->



                </div>
@endsection