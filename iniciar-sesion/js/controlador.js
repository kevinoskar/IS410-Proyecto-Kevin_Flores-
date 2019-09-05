let campos=[
    {id:'login',campoValido:false},
    {id:'password',campoValido:false}
];

function iniciarSesion(){
    console.log(`Validar Campos: Usuario: `+ document.getElementById("login").value +` Password: `+ document.getElementById("password").value);
    for(var i=0;i<campos.length;i++){
        validarCampoVacio(campos[i].id,i);
    }
    console.log(campos[1].campoValido);
    guardarUsuario(validarEmail(document.getElementById("login").value));
    window.location="../Pagina Central/index.html";
}

function validarCampoVacio(id,i){
    if(document.getElementById(id).value==''){
        campos[i].campoValido=false;
        document.getElementById(id).classList.remove("is-valid");
        document.getElementById(id).classList.add("is-invalid");
        return;
    }else{
        campos[i].campoValido=true;
        document.getElementById(id).classList.remove("is-invalid");
        document.getElementById(id).classList.add("is-valid");
    }
}
function validarCampoEmail(id,valido){
    if(valido){
        document.getElementById(id).classList.remove("is-invalid");
        document.getElementById(id).classList.add("is-valid");
    }else{
        document.getElementById(id).classList.remove("is-valid");
        document.getElementById(id).classList.add("is-invalid");
    }
}

function validarEmail(email){
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let resultado =  re.test(email);
    console.log(`El email es correcto? `+resultado);
    validarCampoEmail('login',resultado);
    return resultado;
}
