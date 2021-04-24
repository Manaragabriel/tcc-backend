<?php 

function show_call_status($status){
    if($status == 1){
        return '<span class="badge badge-md badge-boxed  badge-soft-danger">Em aberto</span';
    }
    if($status == 3){
        return '<span class="badge badge-md badge-boxed  badge-soft-success">Encerrado</span>';
    }
}

function show_call_type($type){
    if($type == 1){
        return '<span class="badge badge-md badge-boxed  badge-soft-danger">Suporte</span';
    }
    if($type == 2){
        return '<span class="badge badge-md badge-boxed  badge-soft-success">Alteração</span>';
    }
}




?>