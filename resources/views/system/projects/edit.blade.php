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
                                        <li class="breadcrumb-item active">Editar projeto</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Editar projeto!</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">        
                                    
                                 <form method="POST" action="{{asset('/painel/'.request()->slug.'/projetos/'.$project->id)}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="id" value="{{$project->id}}" />
                                    <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group ">
                                                    <label for="name" class="col-form-label">Titulo do projeto*</label>
                                                    
                                                    <input class="form-control" name="title" type="text" value="{{old('title') ? old('title') : $project->title}}" id="title">
                                                    @error('title')
                                                        <span class="text-danger">{{$errors->first('title')}}</span>
                                                    @enderror
                                                </div>
                                              
                                                <div class="form-group ">
                                                    <label for="image" class="col-form-label text-right">Imagem da Organização*</label>
                                                    <div>
                                                        <input class="form-control" type="file" name="image" id="image">
                                                    </div>
                                                    @error('image')
                                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                                    @enderror
                                                </div> 
                                                <div class="form-group ">
                                                    <label for="description" class=" col-form-label text-right">Descrição</label>
                                                    <div>
                                                        <textarea class="form-control"  name="description" id="description">
                                                        {{old('description') ? old('description') : $project->description}}
                                                        </textarea>
                                                    </div>
                                                    @error('description')
                                                        <span class="text-danger">{{$errors->first('description')}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group text-right">
                                                    <div class="col-lg-3">
                                                        <input type="submit" class="form-control w-50 btn-gradient-primary" value="Enviar">

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