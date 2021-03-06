
var selectedCall = {};
$('.open_call_modal').on('click',function(event){
    event.preventDefault();
    const call = $(this).data('call');
    call.status = call.status == 1 ? 'Em aberto': 'Encerrado';
    call.type = call.type == 1 ? 'Suporte': 'Alteração';
    $('#title-call').html(call.title); 
    $('#description-call').html(call.description); 
    $('#status-call').html(call.status);
    $('#type-call').html(call.type);
    selectedCall = call; 
    $('#callModal').modal()
})

$('#create_task').on('click',function(event){
    event.preventDefault()
    $('#title').val(selectedCall.title);
    $('#description').val(selectedCall.description);
    $('#callModal').modal('hide');
    $('#storeTaskModal').modal();
})

$('#store_task').on('submit',function(event){
    event.preventDefault()
    const data = $(this).serialize();
    const slug = $('#project').val()

    $.ajax({
        url: '/painel/'+ $('#organization_slug').data('slug') + '/projetos/'+ slug +'/kanban/' + 'store_task',
        method: 'POST',
        data,
        dataType: 'json'
    }).then(function(response){
        alert('Tarefa criada com sucesso!')
        
    }).catch(function(error){
        const errorData = error.responseJSON.errors;
        const keys = Object.keys(error.responseJSON.errors);
        
        keys.map(function(key){
            $(`#${key}-error`).html(errorData[key][0])
            $(`#${key}-error`).removeClass('d-none')
        })
        
    })
})


$('#finish_task').on('click',function(event){
    const data = selectedCall;
    data.status = 3;
    $.ajax({
        url: window.location.href + '/update_status/'+data.id,
        method: 'POST',
        data,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).then(function(response){
        alert('Chamado encerrado com sucesso!')
        window.location.reload();
    }).catch(function(error){
        const errorData = error.responseJSON.errors;
        const keys = Object.keys(error.responseJSON.errors);
        
        keys.map(function(key){
            $(`#${key}-error`).html(errorData[key][0])
            $(`#${key}-error`).removeClass('d-none')
        })
        
    })
})

