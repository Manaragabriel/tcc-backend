$('#store_member').on('submit',function(event){
    event.preventDefault()
    const data = $(this).serialize();
    $('.errors').html('')
   
    $.ajax({
        url: window.location.href + '/store',
        method: 'POST',
        data,
        dataType: 'json'
    }).then(function(response){
        alert('Convite enviado com sucesso!')
        $('#email').val('');
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
    event.preventDefault();
    const member = $(this).data('member');
    $('#type').val(member.type); 
    $('#organization_id').val(member.organization_id); 
    $('#user_id').val(member.user_id); 
    $('#editMemberModal').modal()
})


$('#uedit_member').on('submit',function(event){
    event.preventDefault()
    const data = $(this).serialize();
    $('.errors-edit').html('')
   
    $.ajax({
        url: window.location.href + '/update_member' ,
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