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
                                    <li class="list-inline-item mr-0">
                                        <div class="input-group">                               
                                            <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Pesquisar">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-gradient-primary"><i class="fas fa-search"></i></button>
                                            </span>
                                        </div>
                                    </li>
                                   
                                    <li class="list-inline-item">
                                        <a type="button" class="btn btn-gradient-primary mt-1 mt-lg-0" href="{{asset('painel/'.request()->slug.'/chamados/criar')}}">Criar um chamado</a>
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
                                                    <th class="d-none d-lg-table-cell">Descrição</th>
                                                    <th class="d-none d-lg-table-cell">Tipo</th>
                                                    <th>Ação</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($calls as $call)
                                                <tr>
                                                    <td>{{$call->id}}</td>
                                                
                                                    <td>{{$call->title}}</td>
                                                    <td  class="d-none d-lg-table-cell">{{$call->description}}</td>
                                                    <td  class="d-none d-lg-table-cell">{!! show_call_type($call->type) !!}</td>
                                                    <td>
                                                        <button class="btn btn-primary open_call_modal" data-call="{{json_encode($call)}}" >Ver</button>
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

                    <div class="modal fade" id="callModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="store_task">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Visualizar chamado</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <h4 for="title">Título do chamado</h4>
                                            <span class="font-weight-bold" id="title-call" ></span>
                                        </div>

                                        <div class="mb-3">
                                            <h4 >Descrição do chamado</h4>
                                            <span class="font-weight-bold" id="description-call" ></span>

                                        </div>

                                        <div class="mb-3">
                                            <h4 >Status do chamado</h4>
                                            <span class="font-weight-bold" id="status-call" ></span>

                                        </div>

                                        
                                        <div class="mb-3">
                                            <h4 >Tipo do chamado</h4>
                                            <span class="font-weight-bold" id="type-call" ></span>

                                        </div>
                                        
                                    </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/calls.js')}}"></script>
@endsection