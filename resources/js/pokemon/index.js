console.log('Index.js');
let header = document.getElementById('index');
console.log(header);
header.innerHTML = 'Todos los pokemon guardados';
header.classList.add('strong');
header.classList.remove('title');
header.setAttribute('data-id', '5');
header.setAttribute('data-type', 'grass');

$(document).ready(function(){
      $("p").hide();
    });
let header2 = $('#index');
    console.log("Header2");
$('#index').click(function(e){
    console.log('Clicked');
});
