
let campos=[
    {id:'name',campoValido:false},
    {id:'bussines',campoValido:false},
    {id:'fundation',campoValido:false},
    {id:'email-company',campoValido:false},
    {id:'password',campoValido:false},
    {id:'checkbox1',campoValido:false}
];
//Modelo usuario

let registros=[];


function registrarUsuario(){
let empresa={
    name:document.getElementById("name").value,
    lastname:document.getElementById("bussines").value,
    birthday:document.getElementById("fundation").value,
    email:document.getElementById("email-company").value,
    password:document.getElementById("password").value,
    checkbox:$("#checkbox1").is(":checked")
    };

    console.log(empresa);
    validarCampo();
    if(verificarTodos()==true){
        registros.push(empresa);
        console.log("Access Granted");

    }
}

function validarCampo(){
    campos[5].campoValido=$("#checkbox1").is(':checked');
    for(var i=0;i<campos.length-1;i++)
        campos[i].campoValido=validarCampoVacio(campos[i].id);   

    let emailValid=validarEmail(document.getElementById("email-company").value);
    console.log(emailValid);
    campos[3].campoValido=emailValid;
    Marcar(campos[3].id,emailValid)
}
function validarEmail(email){
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
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
