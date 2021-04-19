<?php 

function show_call_status($status){
    if($status == 1){
        return 'Em aberto';
    }
    if($status == 3){
        return 'Encerrado';
    }
}




?>