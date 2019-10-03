let campos=[
    {id:'email',campoValido:false},
    {id:'password',campoValido:false}
];

function iniciarSesion(){
    console.log(`Validar Campos: Usuario: `+ document.getElementById("email").value +` Password: `+ document.getElementById("password").value);
    for(var i=0;i<campos.length;i++){
        validarCampoVacio(campos[i].id,i);
    }
    if(campos[0].campoValido==true && campos[1].campoValido==true){
        if(validarEmail(document.getElementById("email").value)==true){
            let parametros=$('#login').serialize();
            console.log(parametros);
            
    
        }   
    }
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
    validarCampoEmail('email',resultado);
    return resultado;
}
