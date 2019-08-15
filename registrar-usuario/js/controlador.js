
llenarTabla();
//Leer toda la información del localStorage
function llenarTabla(){
    document.getElementById('tabla-registros').innerHTML = ""; //Limpiar la tabla
    for (let i=0;i<localStorage.length;i++){
        console.log(localStorage.key(i));
        let persona = JSON.parse(localStorage.getItem(localStorage.key(i))); //Convertir de cadena a JSON
        anexarTabla(persona, localStorage.key(i));
    }
}



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
    if(verificarTodos()==true){
        console.log(verificarTodos());
        if(localStorage.key(localStorage.length-1)==null){
            key=0;
        }else{
           key= parseInt(localStorage.key(localStorage.length-1))+1; 
        } 
        console.log("Llave a guardar: "+ key);
        localStorage.setItem( key,JSON.stringify(usuario));
        anexarTabla(usuario);
        llenarTabla();
    }else{

    }
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

function anexarTabla(usuario,id){
    console.log(usuario);
    document.getElementById("tabla-registros").innerHTML+=`
        <tr>
            <td>${usuario.name}</td>
            <td>${usuario.lastname}</td>
            <td>${usuario.birthday}</td>
            <td>${usuario.gender}</td>
            <td>${usuario.email}</td>
            <td>${usuario.password}</td>
            <td>${usuario.checkbox}</td>
        </tr>
    `;
}
