
$('#spinner').hide();
let campos=[
    {id:'emailSuperuser',campoValido:false},
    {id:'passwordSuperuser',campoValido:false}
];
$('.dropdown-menu').on('click', function (e) {
  e.stopPropagation();
});



function redirect(){
  window.location="../registrar-usuario/index.html";
}
function redirect2(){
  window.location="../iniciar-sesion/index.html"
;}
function redirect3(){
  window.location="../registrar-empresa/index.html"
}
function redirect4(){
  window.location="../iniciar-sesion-empresa/index.html"
}
function redirectHome(){
 console.log("Acceder al Home")
  window.location="../iniciar-sesion/index.html"
}

function iniciarSesionSU(){
  $('#spinner').show();
    console.log(`Validar Campos: Usuario: `+ document.getElementById("emailSuperuser").value +` Password: `+ document.getElementById("passwordSuperuser").value);
    for(var i=0;i<campos.length;i++)
        validarCampoVacio(campos[i].id,i);
    
    campos[0].campoValido=validarEmail(document.getElementById('emailSuperuser').value);
    if(campos[0].campoValido==true && campos[1].campoValido==true){
      let parametros=$('#formSuperuser').serialize();
      console.log(parametros);
      $.ajax({
        url:'../Backend/ajax/ajax-superuser/superuser.php?action=login',
        method:'POST',
        dataType:'json',
        data:parametros,
        success:(res)=>{
            console.log(res);
            $('#spinner').hide();
            window.location.href="../../Proyecto-IIPAC/superusuario/superusuario.php"
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
  console.log(`El email es correcto: `+resultado);
  validarCampoEmail('emailSuperuser',resultado);
  return resultado;
}