

let campos=[
    {id:'name',campoValido:false},
    {id:'last-name',campoValido:false},
    {id:'birthday',campoValido:false},
    {id:'gender',campoValido:false},
    {id:'email',campoValido:false},
    {id:'password',campoValido:false},
    {id:'checkbox1',campoValido:false}
];
//Modelo usuario

let registros=[];


function registrarUsuario(){
let usuario={
    name:document.getElementById("name").value,
    lastname:document.getElementById("last-name").value,
    birthday:document.getElementById("birthday").value,
    gender:document.getElementById("gender").value,
    email:document.getElementById("email").value,
    password:document.getElementById("password").value,
    checkbox:$("#checkbox1").is(":checked")
    };

    console.log(usuario);
    validarCampo();
    if(verificarTodos()==true)
    window.location="../Pagina-Central/index.html"
}

function validarCampo(){
    campos[6].campoValido=$("#checkbox1").is(':checked');
    for(var i=0;i<campos.length-1;i++)
        campos[i].campoValido=validarCampoVacio(campos[i].id);
        
}
function verificarTodos(){
    var contador=0;
    for(let i=0;i<campos.length;i++){
        if(campos[i].campoValido==true){
           contador++; 
        }
    }
    if(contador==campos.length){
        $("#btn-register").addClass("Ready");
        return true;
    }else{
        return false;
    }
}

function validarCampoVacio(id){
    let resultado = (document.getElementById(id).value =='')?false:true;
    Marcar(id,resultado);
    return resultado;
}
function Marcar(id,valido){
   if(valido){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
   }else{
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
   }
}

