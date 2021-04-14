@extends('system/layout')
@section('content')


<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <button type="button" class="btn btn-block btn-gradient-primary" data-toggle="modal" data-target="#taskModal">Adicionar Tarefa</button>
            </div>
            <h4 class="page-title">Seus Projetos</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>

<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form id="store_task">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Título da tarefa</label>
                    <input type="text" name="title" id="title" class="form-control"/>
                    <span class="text-danger errors d-none" id="title-error" ></span>
                </div>

                <div class="form-group">
                    <label for="title">Descrição da tarefa</label>
                    <textarea type="text" name="description" id="description" class="form-control"></textarea>
                    <span class="text-danger errors d-none" id="description-error" ></span>

                </div>

                <div class="form-group">
                    <label for="title">Responsável</label>
                    <select type="text" name="user_id" id="user_id" class="form-control">
                        @foreach($members as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger errors d-none" id="user-error" ></span>

                </div>
                
            </div>
          
            <div class="modal-footer">
                <button type="submit" class="btn store_task_ajax btn-primary">Criar tarefa</button>
            </div>
        </form>
    </div>
  </div>
</div>


<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form id="update_task">
            {{csrf_field()}}
            
            <input type="hidden" name="id" id="id_edit">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Título da tarefa</label>
                    <input type="text" name="title" id="title_edit" class="form-control"/>
                    <span class="text-danger errors-edit d-none" id="title-error-edit" ></span>
                </div>

                <div class="form-group">
                    <label for="title">Descrição da tarefa</label>
                    <textarea type="text" name="description" id="description_edit" class="form-control"></textarea>
                    <span class="text-danger errors-edit d-none" id="description-error-edit" ></span>

                </div>

                <div class="form-group">
                    <label for="title">Responsável</label>
                    <select type="text" name="user_id" id="user_id_edit" class="form-control">
                        @foreach($members as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger errors-edit d-none" id="user-error-edit" ></span>

                </div>
                
            </div>
          
            <div class="modal-footer">
                <button type="submit" class="btn store_task_ajax btn-primary">Salvar</button>
            </div>
        </form>
    </div>
  </div>
</div>
{{csrf_field()}}
<div class="row">    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="bg-light p-4">
                            <div class="dropdown d-inline-block float-right mt-n2">
                                <a class="nav-link dropdown-toggle arrow-none" id="drop1" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v font-18 text-muted"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop1">
                                    <a class="dropdown-item" href="#">Create Project</a>
                                    <a class="dropdown-item" href="#">Open Project</a>
                                    <a class="dropdown-item" href="#">Tasks Details</a>
                                </div>
                            </div>
                            <h4 class="header-title pb-1 mb-3 mt-0">A fazer</h4>
                            <div id="project-list-left" data-status="1" class="pb-1">
                                
                                @foreach($to_do as $task_to_do)
                                <div class="card" data-id="{{$task_to_do->id}}" >
                                    <div class="card-body">
                                        <div class="dropdown d-inline-block float-right">
                                            <a class="nav-link dropdown-toggle mr-n2 mt-n2" id="drop2" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v text-muted"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop2">
                                                <a class="dropdown-item open_edit_modal" data-task="{{json_encode($task_to_do)}}" href="#">Editar</a>
                                                <form action="/painel/{{request()->slug}}/projetos/{{request()->project }}/kanban/delete_task/{{$task_to_do->id}}" method="POST">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <button class="dropdown-item" type="submit">Deletar</button>
                                                </form>
                                              
                                            </div>
                                        </div><!--end dropdown-->
                                        <i class="mdi mdi-circle-outline d-block mt-n2 font-18 text-warning"></i>
                                        <h5 class="my-1">{{$task_to_do->title}}</h5>
                                        <p class="text-muted mb-2"></p>
                                        <div class="row justify-content-center">
                                            <div class="col-6 align-self-center">
                                                <ul class="list-inline mb-0">                                                                    
                                                    <li class="list-item d-inline-block mr-2">
                                                        <a class="" href="#">
                                                            <i class="mdi mdi-format-list-bulleted text-muted"></i>
                                                            <span class="text-muted font-weight-bold">0/5</span>
                                                        </a>
                                                    </li>
                                                    <li class="list-item d-inline-block">
                                                        <a class="" href="#">
                                                            <i class="mdi mdi-comment-outline text-muted"></i>
                                                            <span class="text-muted font-weight-bold">3</span>
                                                        </a>                                                                               
                                                    </li>
                                                </ul>
                                            </div><!--end col-->
                                            <div class="col-6 align-self-center">
                                                <a class="float-right" href="#">
                                                    <img src="../assets/images/users/user-9.jpg" alt="user" class="thumb-xs rounded-circle">
                                                </a>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                @endforeach

                            </div><!--end project-list-left-->
                           
                        </div><!--end /div-->
                    </div><!--end col-->

                    <div class="col-md-3">
                        <div class="bg-light p-4">
                            <div class="dropdown d-inline-block float-right mt-n2">
                                <a class="nav-link dropdown-toggle arrow-none" id="drop7" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v font-18 text-muted"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop7">
                                    <a class="dropdown-item" href="#">Create Project</a>
                                    <a class="dropdown-item" href="#">Open Project</a>
                                    <a class="dropdown-item" href="#">Tasks Details</a>
                                </div>
                            </div>
                            <h4 class="header-title pb-1 mb-3 mt-0">Fazendo</h4>
                            <div id="project-list-center-left" data-status="2" class="pb-1">
                                
                                @foreach($doing as $task_doing)
                                <div class="card" data-id="{{$task_doing->id}}">
                                    <div class="card-body">
                                        <div class="dropdown d-inline-block float-right">
                                            <a class="nav-link dropdown-toggle mr-n2 mt-n2" id="drop08" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v text-muted"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop08">
                                                <a  class="dropdown-item open_edit_modal" data-task="{{json_encode($task_doing)}}" href="#">Editar</a>
                                                <form action="/painel/{{request()->slug}}/projetos/{{request()->project }}/kanban/delete_task/{{$task_doing->id}}" method="POST">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <button class="dropdown-item" type="submit">Deletar</button>
                                                </form>
                                              
                                            </div>
                                        </div><!--end dropdown-->
                                        <i class="mdi mdi-circle-outline d-block mt-n2 font-18 text-warning"></i>
                                        <h5 class="my-1">{{$task_doing->title}}</h5>
                                      
                                        <div class="row justify-content-center">
                                            <div class="col-6 align-self-center">
                                                <ul class="list-inline mb-0">                                                                    
                                                    <li class="list-item d-inline-block mr-2">
                                                        <a class="" href="#">
                                                            <i class="mdi mdi-format-list-bulleted text-muted"></i>
                                                            <span class="text-muted font-weight-bold">0/5</span>
                                                        </a>
                                                    </li>
                                                    <li class="list-item d-inline-block">
                                                        <a class="" href="#">
                                                            <i class="mdi mdi-comment-outline text-muted"></i>
                                                            <span class="text-muted font-weight-bold">3</span>
                                                        </a>                                                                               
                                                    </li>
                                                </ul>
                                            </div><!--end col-->
                                            <div class="col-6 align-self-center">
                                                <a class="float-right" href="#">
                                                    <img src="../assets/images/users/user-9.jpg" alt="user" class="thumb-xs rounded-circle">
                                                </a>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                @endforeach
                            </div><!--end project-list-left-->
                          
      
                        </div><!--end /div-->
                    </div><!--end col-->
                    
                    <div class="col-md-3">
                        <div class="bg-light p-4">
                            <div class="dropdown d-inline-block float-right mt-n2">
                                <a class="nav-link dropdown-toggle arrow-none" id="drop12" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v font-18 text-muted"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop12">
                                    <a class="dropdown-item" href="#">Create Project</a>
                                    <a class="dropdown-item" href="#">Open Project</a>
                                    <a class="dropdown-item" href="#">Tasks Details</a>
                                </div>
                            </div>

                            <h4 class="header-title pb-1 mb-3 mt-0">Em aprovação</h4>

                            <div id="project-list-center-right" data-status="3" class="pb-1">
                                @foreach($avaliation as $task_avaliation)
                                <div class="card"  data-id="{{$task_avaliation->id}}">
                                    <div class="card-body">
                                        <div class="dropdown d-inline-block float-right">
                                            <a class="nav-link dropdown-toggle mr-n2 mt-n2" id="drop13" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v text-muted"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop13">
                                                <a class="dropdown-item open_edit_modal" data-task="{{json_encode($task_avaliation)}}" href="#">Editar</a>
                                                <form action="/painel/{{request()->slug}}/projetos/{{request()->project }}/kanban/delete_task/{{$task_to_do->id}}" method="POST">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <button class="dropdown-item" type="submit">Deletar</button>
                                                </form>
                                              
                                            </div>
                                        </div><!--end dropdown-->
                                        <i class="mdi mdi-circle-outline d-block mt-n2 font-18 text-warning"></i>
                                        <h5 class="my-1">{{$task_avaliation->title}}</h5>
                                   
                                        <div class="row justify-content-center">
                                            <div class="col-6 align-self-center">
                                                <ul class="list-inline mb-0">                                                                    
                                                    <li class="list-item d-inline-block mr-2">
                                                        <a class="" href="#">
                                                            <i class="mdi mdi-format-list-bulleted text-muted"></i>
                                                            <span class="text-muted font-weight-bold">0/5</span>
                                                        </a>
                                                    </li>
                                                    <li class="list-item d-inline-block">
                                                        <a class="" href="#">
                                                            <i class="mdi mdi-comment-outline text-muted"></i>
                                                            <span class="text-muted font-weight-bold">3</span>
                                                        </a>                                                                               
                                                    </li>
                                                </ul>
                                            </div><!--end col-->
                                            <div class="col-6 align-self-center">
                                                <a class="float-right" href="#">
                                                    <img src="../assets/images/users/user-5.jpg" alt="user" class="thumb-xs rounded-circle">
                                                </a>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                @endforeach
                                                 
                            </div><!--end project-list-right-->
             
                        </div><!--end /div-->
                    </div><!--end col-->

                    <div class="col-md-3">
                        <div class="bg-light p-4">
                            <div class="dropdown d-inline-block float-right mt-n2">
                                <a class="nav-link dropdown-toggle arrow-none" id="drop16" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v font-18 text-muted"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop16">
                                    <a class="dropdown-item" href="#">Create Project</a>
                                    <a class="dropdown-item" href="#">Open Project</a>
                                    <a class="dropdown-item" href="#">Tasks Details</a>
                                </div>
                            </div>

                            <h4 class="header-title pb-1 mb-3 mt-0">Concluído</h4>

                            <div id="project-list-right" data-status="4" class="pb-1">
                            @foreach($done as $task_done)
                                <div class="card" data-id="{{$task_done->id}}">
                                    <div class="card-body">
                                        <div class="dropdown d-inline-block float-right">
                                            <a class="nav-link dropdown-toggle mr-n2 mt-n2" id="drop17" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v text-muted"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop17">
                                                <a class="dropdown-item open_edit_modal" data-task="{{json_encode($task_done)}}" href="#">Editar</a>
                                                <form action="/painel/{{request()->slug}}/projetos/{{request()->project }}/kanban/delete_task/{{$task_done->id}}" method="POST">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <button class="dropdown-item" type="submit">Deletar</button>
                                                </form>
                                              
                                            </div>
                                        </div><!--end dropdown-->
                                        <i class="mdi mdi-circle-outline d-block mt-n2 font-18 text-warning"></i>
                                        <h5 class="my-1">{{$task_done->title}}</h5>
                                        <p class="text-muted mb-2"></p>
                                        <div class="row justify-content-center">
                                            <div class="col-6 align-self-center">
                                                <ul class="list-inline mb-0">                                                                    
                                                    <li class="list-item d-inline-block mr-2">
                                                        <a class="" href="#">
                                                            <i class="mdi mdi-format-list-bulleted text-muted"></i>
                                                            <span class="text-muted font-weight-bold">0/5</span>
                                                        </a>
                                                    </li>
                                                    <li class="list-item d-inline-block">
                                                        <a class="" href="#">
                                                            <i class="mdi mdi-comment-outline text-muted"></i>
                                                            <span class="text-muted font-weight-bold">3</span>
                                                        </a>                                                                               
                                                    </li>
                                                </ul>
                                            </div><!--end col-->
                                            <div class="col-6 align-self-center">
                                                <a class="float-right" href="#">
                                                    <img src="../assets/images/users/user-5.jpg" alt="user" class="thumb-xs rounded-circle">
                                                </a>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                @endforeach

                            </div><!--end project-list-right-->
              
                        </div><!--end /div-->
                    </div><!--end col-->
                </div><!--end row-->                                
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
                    </div


@endsection

@section('scripts')
    <script src="{{asset('assets/js/projects.js')}}"></script>
@endsection