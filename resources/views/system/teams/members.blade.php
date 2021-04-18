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
                                        <li class="breadcrumb-item active">Membros da equipe </li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Membros da equipe</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h5 class="mt-0">Lista com todos os membros da equipe
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
                                        <button type="button" class="btn btn-gradient-primary"  data-toggle="modal" data-target="#memberModal">Adicionar um membro</button>
                                    </li>
                                </ul>
                            </div>                            
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="store_member">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Adicionar um membro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="title">Usuário</label>
                                            <select type="text" name="user_id" id="user_id" class="form-control">
                                                @foreach($members_organization as $member)
                                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger errors d-none" id="email-error" ></span>
                                        </div>
                                        
                                    </div>
                                
                                    <div class="modal-footer">
                                        <button type="submit" class="btn store_task_ajax btn-primary">Adicionar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

               

                    <div class="row">
                        @foreach($members as $member)
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">                                        
                                        <div class=" d-flex justify-content-end">                                        
                                            <div class="dropdown d-inline-block">
                                                <a class="nav-link dropdown-toggle arrow-none" id="dLabel1" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel1">
                                                   
                                                    <form action="{{url()->current()}}/delete_member/{{$member->id }}" method="POST">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <button class="dropdown-item btn"  type="submit">Remover</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="text-center project-card">
                                            <img src="../assets/images/widgets/p-1.svg" alt="" height="80" class="mx-auto d-block mb-3"> 
                       
                                            <a class="project-title h3 " href="/painel/">{{$member->name}}</a>
                                            <p class="text-muted"><span class="text-secondary font-14">
                                               
                                            </p>
                                            

                                              
                                        </div>                                                                      
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->

                        @endforeach

             
                    </div><!--end row-->



                </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/members_teams.js')}}"></script>
@endsection