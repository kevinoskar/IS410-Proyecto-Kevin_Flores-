$("#spinner").hide();

let campos=[
    {id:'name',campoValido:false},
    {id:'lastName',campoValido:false},
    {id:'birthday',campoValido:false},
    {id:'gender',campoValido:false},
    {id:'postal',campoValido:false},
    {id:'country',campoValido:false},
    {id:'state',campoValido:false},
    {id:'address',campoValido:false},
    {id:'phone',campoValido:false},
    {id:'email',campoValido:false},
    {id:'password',campoValido:false},
    {id:'nameOwner',campoValido:false},
    {id:'creditNumber',campoValido:false},
    {id:'expirationDate',campoValido:false},
    {id:'cvv',campoValido:false},
    {id:'urlProfileImage',campoValido:false}
];
//Modelo usuario


function registrarUsuario(){
    $("#spinner").show();
    let usuario={
    name:document.getElementById("name").value,
    lastname:document.getElementById("lastName").value,
    birthday:document.getElementById("birthday").value,
    gender:document.getElementById("gender").value,
    postal:document.getElementById("postal").value,
    country:document.getElementById("country").value,
    state:document.getElementById("state").value,
    address:document.getElementById("address").value,
    phone:document.getElementById("phone").value,
    email:document.getElementById("email").value,
    password:document.getElementById("password").value,
    checkbox:$("#politcs").is(":checked"),
    nameOwner:document.getElementById("nameOwner").value,
    creditNumber:document.getElementById("creditNumber").value,
    expirationDate:document.getElementById("expirationDate").value,
    cvv:document.getElementById("cvv").value
    };

    
    validarCampo();
    campos[9].campoValido=validarEmail(document.getElementById('email').value);
    campos[10].campoValido=validarPassword(document.getElementById('password').value);
    campos[4].campoValido=validarPostal(document.getElementById('postal').value);
    campos[8].campoValido=validarPhone(document.getElementById('phone').value);
    console.log(campos);
    if(validarCreditVisa(document.getElementById('creditNumber').value==true)){
        campos[12].campoValido=true;
    }else{
        campos[12].campoValido=validarCreditMastercard(document.getElementById('creditNumber').value);
    }
    campos[13].campoValido=validarCvv(document.getElementById('cvv').value);
    if(verificarTodos()==true){
        console.log("Acceso Granted");
        var parametros=$("#formUser").serialize()+"&urlProfileImage="+"../Backend/images/users-image/users-image-profile/"+document.getElementById("urlProfileImage").files[0].name;
        console.log(parametros);

        $.ajax({
            url: '../Backend/ajax/ajax-users/users.php',
            method: 'POST',
            data: parametros,
            success:function(res){
                console.log(res);
                $("#spinner").hide();
            },
            error:function(error){
                console.error(error);
            }
        });

    }
    
}
function validarCampo(){
    for(var i=0;i<campos.length;i++)
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
        $("#btn-register").removeClass("Wrong");
        $("#btn-register").addClass("Ready");
        return true;
    }else{
        $("#btn-register").removeClass("Ready");
        $("#btn-register").addClass("Wrong");
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
function subirImagen(){  
    if(document.getElementById("urlProfileImage").value!=""){
        var formData = new FormData();
        var files = $('#urlProfileImage')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'php/uploader.php',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success:function(res){
                console.log(res);
                console.log("La imagen subida tiene el URL:"+res);
                verImagen(res);
            },
            error:function(error){
                console.error(error);
            }
        });

    }
   
}

function verImagen(url){
    document.getElementById("smallImage").innerHTML=`
        <img src="${url}">
    `;

}
function validarPassword(password){
    let re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    let resultado =  re.test(password);
    Marcar('password',resultado)
    return resultado;

}

function validarEmail(email){
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let resultado =  re.test(email);
    Marcar('email',resultado);
    return resultado;
}

function validarPostal(postal){
    let re =/^[0-9]{3}$/;
    let resultado =  re.test(postal);
    Marcar('postal',resultado);
    return resultado;
}
function validarPhone(phone){
    let re =/^[1-9][0-9]{7}$/;
    let resultado =  re.test(phone);
    Marcar('phone',resultado);
    return resultado;
}
function validarCreditVisa(credit){
    let re =/^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/;
    let resultado =  re.test(credit);
    Marcar('creditNumber',resultado);
    return resultado;
}
function validarCreditMastercard(credit){
    let re =/^5[1-5]\d{2}-?\d{4}-?\d{4}-?\d{4}$/;
    let resultado =  re.test(credit);
    Marcar('creditNumber',resultado);
    return resultado;
}
function validarCvv(cvv){
    let re =/^[0-9]{3,4}$/;
    let resultado =  re.test(cvv);
    Marcar('cvv',resultado);
    return resultado;
}

