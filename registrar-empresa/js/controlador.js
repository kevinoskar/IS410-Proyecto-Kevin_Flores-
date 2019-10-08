$("#spinner").hide();
$(".advice3").hide();
(function(){
    document.getElementById('oriented').innerHTML=`
    <option value="">Seleccione un rubro</option>
    <option value="tecnology">Tecnología</option>
    <option value="fashion">Moda</option>
    <option value="sports">Deportes</option>
    <option value="electrodomestic">Electrodomésticos</option>
    <option value="home">Hogar</option>
    <option value="accesories">Accesorios</option>
    
    `;

}());


let campos=[
    {id:'nameCompany',campoValido:false},
    {id:'descriptionCompany',campoValido:false},
    {id:'oriented',campoValido:false},
    {id:'fundationDate',campoValido:false},
    {id:'emailCompany',campoValido:false},
    {id:'passwordCompany',campoValido:false},
    {id:'postalCode',campoValido:false},
    {id:'country',campoValido:false},
    {id:'state',campoValido:false},
    {id:'addressCompany',campoValido:false},
    {id:'phoneNumberCompany',campoValido:false},
    {id:'latitute',campoValido:false},
    {id:'longitude',campoValido:false},
];



function registrarUsuario(){
    $("#spinner").show();
    validarCampo();
    campos[5].campoValido=validarEmail(document.getElementById('emailCompany').value);
    campos[6].campoValido=validarPassword(document.getElementById('passwordCompany').value);
    campos[7].campoValido=validarPostal(document.getElementById('postalCode').value);
    campos[10].campoValido=validarPhone(document.getElementById("phoneNumberCompany").value)
    campos[11].campoValido=validarlatitud(document.getElementById("latitute").value);
    campos[12].campoValido=validarlongitud(document.getElementById("longitude").value);
    console.log(campos)
    if(verificarTodos()==true){
        console.log("Access Granted ");
        let parametros=$("#formCompany").serialize();
        console.log(parametros);
        $.ajax({
            url: '../Backend/ajax/ajax-company/company.php',
            method: 'POST',
            data: parametros,
            success:function(res){
                console.log(res);
                $("#spinner").hide();
                if(res.valid){
                    window.location.href="../../Proyecto-IIPAC/Iniciar-sesion-empresa/index.html";
                    
                }else{
                    $("#btn-register").removeClass("Ready");
                    $(".advice3").show();
                }
                    
            },
            error:function(error){
                console.error(error);
            }
        });
    }
}

function validarCampo(){
    for(var i=0;i<campos.length-1;i++)
        campos[i].campoValido=validarCampoVacio(campos[i].id);   

}

function validarEmail(email){
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let resultado =  re.test(email);
    Marcar('emailCompany',resultado);
    return resultado;
}

function validarPostal(postal){
    let re =/^[0-9]{3}$/;
    let resultado =  re.test(postal);
    Marcar('postalCode',resultado);
    return resultado;
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

function validarPassword(password){
    let re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    let resultado =  re.test(password);
    Marcar('passwordCompany',resultado)
    return resultado;

}

function validarlatitud(latitute){
    let re= /^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)$/;
    let=resultado=re.test(latitute);
    Marcar('latitute',resultado);
    return resultado;
}

function validarlongitud(longitude){
    let re= /^[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/;
    let resultado =re.test(longitude);
    Marcar('longitude',resultado);
    return resultado;
}

function validarPostal(postal){
    let re =/^[0-9]{3}$/;
    let resultado =  re.test(postal);
    Marcar('postalCode',resultado);
    return resultado;
}
function validarPhone(phone){
    let re =/^[1-9][0-9]{7}$/;
    let resultado =  re.test(phone);
    Marcar('phoneNumberCompany',resultado);
    return resultado;
}