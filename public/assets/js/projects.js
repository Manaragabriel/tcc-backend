$('#store_task').on('submit',function(event){
    event.preventDefault()
    const data = $(this).serialize();
    $('.errors').html('')
   
    $.ajax({
        url: window.location.href + '/store_task',
        method: 'POST',
        data,
        dataType: 'json'
    }).then(function(response){
        alert('Tarefa criada com sucesso!')
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

$('.open_edit_modal').on('click',function(event){
    event.preventDefault()
    const task = $(this).data('task')
    $('#id_edit').val(task.id);
    $('#title_edit').val(task.title);
    $('#description_edit').val(task.description);
    $('#user_id_edit').val(task.user_id);
    $('#editTaskModal').modal()
})

$('#edit_member').on('submit',function(event){
    event.preventDefault()
    const data = $(this).serialize();
    $('.errors-edit').html('')
   
    $.ajax({
        url: window.location.href + '/update_task' ,
        method: 'POST',
        data,
        dataType: 'json'
    }).then(function(response){
        alert('Configurações de membro alteradas com sucesso!')
      
    }).catch(function(error){
        const errorData = error.responseJSON.errors;
        const keys = Object.keys(error.responseJSON.errors);
        
        keys.map(function(key){
            $(`#${key}-error-edit`).html(errorData[key][0])
            $(`#${key}-error-edit`).removeClass('d-none')
        })
        
    })
})
