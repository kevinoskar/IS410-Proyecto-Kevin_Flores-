
let campos=[
    {id:'name',campoValido:false},
    {id:'bussines',campoValido:false},
    {id:'fundation',campoValido:false},
    {id:'email-company',campoValido:false},
    {id:'password',campoValido:false},
    {id:'checkbox1',campoValido:false}
];
let campos2=[
    {id:'address',campoValido:false},
    {id:'latLong',campoValido:false},
    {id:'country',campoValido:false},
    {id:'name',campoValido:false}
];
//Modelo usuario

let registros=[];

function llenarPaises(){
    document.getElementById("country").innerHTML+=`
        <option value="1" id="DE">Alemania</option>
        <option value="2" id="AR">Argentina</option>
        <option value="3" id="AU">Australia</option>
        <option value="4" id="BS">Bahamas</option>
        <option value="5" id="BE">Bélgica</option>
        <option value="6" id="BZ">Belice</option>
        <option value="7" id="BO">Bolivia</option>
        <option value="8" id="BR">Brasil</option>
        <option value="9" id="CA">Canadá</option>
        <option value="10" id="CL">Chile</option>
        <option value="11" id="CN">China</option>
        <option value="12" id="CO">Colombia</option>
        <option value="13" id="KR">Corea</option>
        <option value="14" id="KP">Corea del Norte</option>
        <option value="15" id="CR">Costa Rica</option>
        <option value="16" id="CU">Cuba</option>
        <option value="17" id="EC">Ecuador</option>
        <option value="18" id="SV">El Salvador</option>
        <option value="19" id="ES">España</option>
        <option value="20" id="US">Estados Unidos</option>
        <option value="21" id="FR">Francia</option>
        <option value="22" id="GT">Guatemala</option>
        <option value="23" id="NL">Holanda</option>
        <option value="24" id="HN">Honduras</option>
        <option value="25" id="HK">Hong Kong</option>
        <option value="26" id="IL">Israel</option>
        <option value="27" id="IT">Italia</option>
        <option value="28" id="JM">Jamaica</option>
        <option value="29" id="JP">Japón</option>
        <option value="30" id="JO">Jordania</option>
        <option value="31" id="MX">México</option>
        <option value="32" id="NI">Nicaragua</option>
        <option value="33" id="NZ">Nueva Zelanda</option>
        <option value="34" id="PA">Panamá</option>
        <option value="35" id="PY">Paraguay</option>
        <option value="36" id="PE">Perú</option>
        <option value="37" id="PT">Portugal</option>
        <option value="38" id="PR">Puerto Rico</option>
        <option value="39" id="UK">Reino Unido</option>
        <option value="40" id="RU">Rusia</option>
        <option value="41" id="SE">Suecia</option>
        <option value="42" id="CH">Suiza</option>
        <option value="43" id="UY">Uruguay</option>
        <option value="44" id="VE">Venezuela</option>
    `
}


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
        console.log("Access Granted ");
        Form2();

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

function Form2(){
    document.getElementById("form-content").innerHTML="";
    document.getElementById("form-content").innerHTML+=`
    <input type="text" id="address" class="fadeIn second" name="login" placeholder="Dirección">
    <div class="advice2">Latitud y Longitud (Seguir la forma)</div> 
    <input type="text" id="latLong" class="fadeIn second" placeholder="[±0-90.000],[±0-180.000]">
    <select name="" id="country">
        <option value="">Seleccione su pais</option>
    </select>
    <div class="advice2">Subir Logotipo de la empresa</div>
    <input type="file" name="locotype" id="logotype">
    <div id="formFooter">
        <button id="btn-register" type="button" onclick="registrarUsuario2()" class="fadeIn fourth" value="Registrar"">REGISTRAR</button>
    </div>

    `
    llenarPaises();

}

function registrarUsuario2(){
    let empresa2={
        address:document.getElementById("address").value,
        latLong:document.getElementById("latLong").value,
        country:document.getElementById("country").value,
        logotype:document.getElementById("logotype").value
    };

    console.log(empresa2);
    Marcar("latLong",validarlatitud(document.getElementById("latLong").value));
    console.log("Access Total redirecting..")
    window.location.replace("../login/index.html");
}


function validarlatitud(latLong){
    let lalo= /^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/;
    return lalo.test(latLong);
}
