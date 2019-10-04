$('#spinner').hide();
let campos=[
    {id:'emailCompany',campoValido:false},
    {id:'passwordCompany',campoValido:false}
];

function iniciarSesion(){
    $('#spinner').show();
    console.log(`Validar Campos: Usuario: `+ document.getElementById("emailCompany").value +` Password: `+ document.getElementById("passwordCompany").value);
    for(var i=0;i<campos.length;i++){
        validarCampoVacio(campos[i].id,i);
    }
    console.log(campos[1].campoValido);
    validarEmail(document.getElementById("emailCompany").value);
    if(campos[0].campoValido==true && campos[1].campoValido==true){
        let parametros=$('#formCompany').serialize();
            console.log(parametros);
            $.ajax({
                url:'../Backend/ajax/ajax-company/company.php?action=login',
                method:'POST',
                dataType:'json',
                data:parametros,
                success:(res)=>{
                    console.log(res);
                    $('#spinner').hide();
                    /*if(res.valid)
                    window.location.href="../../Proyecto-IIPAC/Pagina-Central/index.php";*/
                },
                error:(error)=>{
                    console.log(error);
                }
            });

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
    console.log(`El email es correcto:  `+resultado);
    validarCampoEmail('emailCompany',resultado);
    return resultado;
}
