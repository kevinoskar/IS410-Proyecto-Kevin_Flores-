llenarPaises();
(function(){
    $.ajax({
        url:'../../Backend/ajax/ajax-company/company.php?action=userAccessKey',
        method:'GET',
        dataType:'json',
        success:function(res){
            console.log(res); 
            userData(res);
                           
        },
        error:function(error){
            console.error(error);
        }
    })

})();

function userData(companyjson){
    var parametro=companyjson.keyCompany;
    console.log(parametro);
    $.ajax({
        url:'../../Backend/ajax/ajax-company/company.php?id='+parametro,
        method:'GET',
        dataType:'json',
        success:function(res){
            console.log(res);
            //imprimirInformacion(res);
        },
        error:function(error){
            console.error(error);
        }
    });

}













function subirImagen(){  
    if(document.getElementById("urlimagen").value==""){
        console.log("Foto no seleccionada");
        return;
    }else{
        var formData = new FormData();
        var files = $('#urlimagen')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'php/uploader.php',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success:function(res){
                console.log(res);
                imageVisible(res);
            },
            error:function(error){
                console.error(error);
            }
        });
    }
}
function imageVisible(res){
    document.getElementById("Imagen").innerHTML=`
        <img class="box-profile-image" src="${res}" alt="profile-image" title="Cambiar Imagen">
    `;
}
function imageVisibleBanner(res){
    document.getElementById("imagen2").innerHTML=`
    <img src="${res}" class="box-profile-banner" alt="" title="Cambiar Banner">
    `;
}
function subirImagenBanner(){
if(document.getElementById("urlbanner").value==""){
    console.log("Banner no seleccionado");
    return;
}else{
    var formData = new FormData();
    var files = $('#urlbanner')[0].files[0];
    formData.append('file',files);
    $.ajax({
        url: 'php/uploader.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success:function(res){
            console.log(res);
            imageVisibleBanner(res);
        },
        error:function(error){
            console.error(error);
        }
    });
}
}

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
