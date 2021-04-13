/**
 * Theme: Metrica - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Dragula Js
 */

 
var iconTochange;
dragula([document.getElementById("dragula-left"), 
        document.getElementById("dragula-right")]);

const drake = dragula([
    document.getElementById("project-list-left"),
    document.getElementById("project-list-center-left"),
    document.getElementById("project-list-center-right"), 
    document.getElementById("project-list-right")
]);
drake.on('drop',function(el,target,source,sibling){
    const status = $(target).data('status')
    const id = $(el).data('id')

   
    $.ajax({
        url: window.location.href + '/update_status_task',
        method: 'POST',
        data: {id,status},
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).then(function(response){
        
    }).catch(function(error){
        alert('Houve um erro ao mudar o status da tarefa! Tente novamente mais tarde')
        window.location.reload()
    })
})
