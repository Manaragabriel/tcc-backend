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
    console.log('here')
})