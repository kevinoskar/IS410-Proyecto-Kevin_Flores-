
(function(){
    document.getElementById('bussines').innerHTML=`
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
    {id:'name',campoValido:false},
    {id:'bussines',campoValido:false},
    {id:'fundation',campoValido:false},
    {id:'emailCompany',campoValido:false},
    {id:'password',campoValido:false},
    {id:'companyPolitics',campoValido:false}
];
let campos2=[
    {id:'address',campoValido:false},
    {id:'latitute',campoValido:false},
    {id:'longitude',campoValido:false},
    {id:'country',campoValido:false},
];
//Modelo usuario

let registros=[];



function registrarUsuario(){
let empresa={
    name:document.getElementById("name").value,
    lastname:document.getElementById("bussines").value,
    birthday:document.getElementById("fundation").value,
    email:document.getElementById("emailCompany").value,
    password:document.getElementById("password").value,
    checkbox:$("#companyPolitics").is(":checked")
    };

    console.log(empresa);
    validarCampo();
    campos[4].campoValido=validarPassword(document.getElementById('password').value);
    console.log(campos[4].campoValido);
    if(verificarTodos()==true){
        registros.push(empresa);
        console.log("Access Granted ");
        Form2();
    }
}

function validarCampo(){
    campos[5].campoValido=$("#companyPolitics").is(':checked');
    for(var i=0;i<campos.length-1;i++)
        campos[i].campoValido=validarCampoVacio(campos[i].id);   

    let emailValid=validarEmail(document.getElementById("emailCompany").value);
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
    <input type="text" id="latitute" class="fadeIn second" placeholder="[±0-90.000]">
    <input type="text" id="longitude" class="fadeIn second" placeholder="[±0-180.000]">
    <select name="" class="second" id="country">
        <option value="">Seleccione su pais</option>
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
    </select>
    <div id="formFooter">
        <button id="btn-register" type="button" onclick="registrarUsuario2()" class="fadeIn fourth" value="Registrar"">REGISTRAR</button>
    </div>

    `
}

function registrarUsuario2(){
    let empresa2={
        address:document.getElementById("address").value,
        latitute:document.getElementById("latitute").value,
        longitude:document.getElementById("longitude").value,
        country:document.getElementById("country").value,
    };

    console.log(empresa2);
    campos2[0].campoValido=validarCampoVacio(campos2[0].id);  
    campos2[3].campoValido=validarCampoVacio(campos2[3].id);
    Marcar(campos2[1].id,campos2[1].campoValido=validarlatitud(document.getElementById("latitute").value));
    Marcar(campos2[2].id,campos2[2].campoValido=validarlongitud(document.getElementById("longitude").value));
    console.log(campos2[1].campoValido=validarlatitud(document.getElementById("latitute").value));
    console.log(campos2[2].campoValido=validarlongitud(document.getElementById("longitude").value));
    console.log("Los Valores del campo 1 "+campos2[1].campoValido+"Y son"+campos2[2].campoValido);
    console.log(campos2[3].campoValido);
    

    /*console.log("Access Total redirecting..")
    window.location.replace("../login/index.html");*/
}

function validarPassword(password){
    let re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    let resultado =  re.test(password);
    Marcar('password',resultado)
    return resultado;

}

function validarlatitud(latitute){
    let lalo= /^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)$/;
    return lalo.test(latitute);
}

function validarlongitud(longitude){
    let lalo= /^[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/;
    return lalo.test(longitude);
}
