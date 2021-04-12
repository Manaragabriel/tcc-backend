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