@extends('system/layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-5 p-3 text-center">
                <div>
                    
                    <img class="img-dashboard" src="/storage/users/user.png"/>
                    <h3 class="text-center ">Bem vindo ao sistema {{auth()->user()->name}}</h3>
                    <p class="text-center">Utilize o menu lateral para navegar pelo sistema</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection