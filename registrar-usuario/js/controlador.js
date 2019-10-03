

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
    {id:'politcs',campoValido:false}
];
//Modelo usuario

let campos2=[
    {id:'nameOwner',campoValido:false},
    {id:'creditNumber',campoValido:false},
    {id:'expirationDate',campoValido:false},
    {id:'cvv',campoValido:false}
];

function registrarUsuario(){
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
    checkbox:$("#politcs").is(":checked")
    };

    console.log(usuario);
    validarCampo();
    validarEmail(document.getElementById('email').value);
    validarPassword(document.getElementById('password').value);
    if(verificarTodos()==true){
        console.log(campos);
        formularioNuevo();
    }
    
}

function validarCampo(){
    campos[11].campoValido=$("#politcs").is(':checked');
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

function formularioNuevo(){
    document.getElementById("form").innerHTML="";
    document.getElementById("form").innerHTML+=`
    <h1>Tarjeta de Crédito/Débito</h1>
    <input type="text" id="nameOwner" class="fadeIn second" name="login" placeholder="Titular de la Tarjeta">
    <div class="advice">Número de tarjeta de crédito/débito</div>
    <input type="text" id="creditNumber" class="fadeIn second" name="login" placeholder="XXXX-XXXX-XXXX-XXXX" required>
    <div class="advice">Fecha de Vencimiento</div>
    <input type="date" id="expirationDate" class="fadeIn second" name="login" placeholder="Fecha de Vencimiento">
    <input type="text" id="cvv" class="fadeIn second" name="login" placeholder="CVV">
    <div class="advice">Sube una imagen de Perfil</div></br>
    <input type="file" name="profileImage" id="profileImage">
    <button type="button" class="btn-save-changes" onclick="subirImagen()">Subir Imagen</button></br>
    <div class="small-image-profile" id="smallImage">

    </div>
    <button id="btn-register" type="button" onclick="registrarUsuario2()" class="fadeIn fourth" value="Registrar"">REGISTRAR</button>

    `;
}
function registrarUsuario2(){
    let usuariosCredito={
        nameOwner:document.getElementById("nameOwner").value,
        creditNumber:document.getElementById("creditNumber").value,
        expirationDate:document.getElementById("expirationDate").value,
        cvv:document.getElementById("cvv").value
        };

    console.log(usuariosCredito);
    validarCampo2();
    if(verificarTodos2()==true){
        console.log(campos2);
        window.location="../Pagina-Central/index.html";
    }
    
}

function validarCampo2(){
    for(var i=0;i<campos2.length;i++)
        campos2[i].campoValido=validarCampoVacio(campos2[i].id);
}

function verificarTodos2(){
    var contador=0;
    for(let i=0;i<campos2.length;i++){
        if(campos2[i].campoValido==true){
           contador++; 
        }
    }
    if(contador==campos2.length){
        $("#btn-register").removeClass("Wrong");
        $("#btn-register").addClass("Ready");
        return true;
    }else{
        $("#btn-register").removeClass("Ready");
        $("#btn-register").addClass("Wrong");
        return false;
    }
}

function subirImagen(){  
    if(document.getElementById("profileImage").value!=""){
        var formData = new FormData();
        var files = $('#profileImage')[0].files[0];
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

