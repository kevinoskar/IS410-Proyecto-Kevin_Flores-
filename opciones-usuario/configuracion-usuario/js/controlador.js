
function subirImagen(){  
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
function imageVisible(res){
    document.getElementById("Imagen").innerHTML=`
        <img class="box-profile-image" src="${res}" alt="profile-image" title="Cambiar Imagen">
    `;
}

(function(){
    $.ajax({
        url:'../../Backend/ajax/ajax-users/users.php?action=userAccessKey',
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

function userData(usuariojson){
    var parametro=usuariojson.key;
    console.log(parametro);
    $.ajax({
        url:'../../Backend/ajax/ajax-users/users.php?id='+parametro,
        method:'GET',
        dataType:'json',
        success:function(res){
            console.log(res);
            imprimirInformacion(res);
        },
        error:function(error){
            console.error(error);
        }
    });

}
function imprimirInformacion(usuario){
    $("#formProfile").append(`
        <div id="Imagen" class="form-control image-profile">
            <img class="box-profile-image" name="urlProfileImage" id="urlProfileImage" src="../${usuario.urlProfileImage}" alt="profile-image" title="Cambiar Imagen">
        </div>
        <input id="urlProfileImage" name="urlProfileImage" type="file">
        <button id="buttonUpload" type="button" onclick="subirImagen()">Subir Imagen</button>
        <hr class="hr1">
        <h2>Listos para modificar tus campos ${usuario.name} ${usuario.lastName}.</h2>
        <h1>Datos Personales</h1>
        <table>
            <tbody class="col-md-12 col-xs-12 col-lg-12">
                <tr>
                    <td><label for="">Nombre Completo</label><br></td>
                    <td><input type="text" name="name" id="name" value="${usuario.name}"><br></td>
                </tr>
                <tr>
                    <td><label for="">Apellidos</label><br></td>
                    <td><input type="text" id="lastName" id="lastName" value="${usuario.lastName}"></td>
                </tr>
                <tr>
                    <td><label for="">Fecha de Nacimiento</label><br></td>
                    <td><input type="date" name="birthday" id="birthday" value="${usuario.birthday}" id="date"></td>
                </tr>
                <tr>
                    <td><label for="">Sexo</label><br></td>
                    <td><select  id="gender" value"${usuario.gender}" name="gender">
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="NoBinario">No binario</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="">Código Postal</label><br></td>
                    <td><input type="text" name="postal" id="postal" value="${usuario.postal}"></td>
                </tr>
                <tr>
                    <td><label for="">Pais</label><br></td>
                    <td><select name="country" id="country" value="${usuario.country}">
                    <option value="">Seleccionar Pais</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Brasil">Brasil</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Corea del Sur">Corea del Sur</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Dominica">Dominica</option>
                    <option value="EUA">EUA</option>>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="España">España</option>
                    <option value="Francia">Francia</option>
                    <option value="Guatemala">Guatemala</option>>
                    <option value="Holanda">Holanda</option>
                    <option value="Honduras" selected>Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>>
                    <option value="Inglaterra">Inglaterra</option>
                    <option value="Italia">Italia</option>
                    <option value="Japón">Japón</option>
                    <option value="Luxenburgo">Luxenburgo</option>
                    <option value="México">México</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Panamá">Panamá</option>
                    <option value="Perú">Peru</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Rep. Dominicana">Rep. Dominicana</option>
                    <option value="Rusia">Rusia</option>
                    <option value="Singapur">Singapur</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Venezuela">Venezuela</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="">Estado o Departamento</label><br></td>
                    <td><input type="text" name="state" id="state" value="${usuario.state}"></td>
                </tr>
                <tr>
                    <td><label for="">Dirección</label><br></td>
                    <td><input type="text" id="address" name="address" value="${usuario.address}"></td>
                </tr>
                <tr>
                    <td><label for="">Teléfono</label><br></td>
                    <td><input type="text" id="phone" name="phone" value="${usuario.phone}"></td>
                </tr>
                <tr>
                    <td><label >Correo Electroníco</label><br></td>
                    <td><input type="text" id="email" name="email" value="${usuario.email}"></td>
                </tr>
                <tr>
                    <td><label for="">Contraseña Actual</label><br></td>
                    <td><input type="password" name="password" id="password" value="${usuario.password}"></td>
                </tr>
            </tbody>
        </table>
        <h1>Crédito/Débito</h1>
        <table>
            <tbody class="col-md-12 col-xs-12 col-lg-12">
                <tr>
                    <td><label for="">Titular de la tarjeta</label></td>
                    <td><input type="text" id="nameOwner" name="nameOwner" value="${usuario.nameOwner}"></td>
                </tr>
                <tr>
                    <td><label for="">Número de tarjeta de crédito/débito</label><br></td>
                    <td><input type="text" name="creditNumber" id="creditNumber" value="${usuario.creditNumber}"><br>
                    <i class="card-1 fab fa-cc-visa"></i>
                    <i class="card-1 fab fa-cc-mastercard"></i>
                    </td>
                </tr>
                <tr>
                    <td><label for="">Fecha de Vencimiento</label><br></td>
                    <td><input type="datetime" id="expirationDate" name="expirationDate" value="${usuario.expirationDate}" id=""></td>
                </tr>
                <tr>
                    <td><label for="">CVV</label><br></td>
                    <td><input type="text" id="cvv" name="cvv" value="${usuario.cvv}"></td>
                </tr>
            </tbody>
        </table>
        <button class="btn-save-changes form-control" onclick="obtener()" type="button">Guardar Cambios</button>
    `);
}


function obtener(){
    $.ajax({
        url:'../../Backend/ajax/ajax-users/users.php?action=userAccessKey',
        method:'GET',
        dataType:'json',
        success:function(res){
            console.log(res); 
            guardarCambios(res)
                           
        },
        error:function(error){
            console.error(error);
        }
    });
}



function guardarCambios(llave){
    let datos=$("#formProfile").serialize()+"&urlProfileImage="+"../../Backend/images/users-image/users-image-profile/"+document.getElementById("urlProfileImage").files[0].name;
    console.log(datos);
    /*
    $.ajax({
        url:'../../Backend/ajax/ajax-users/users.php?id='+llave.key,
        method:'PUT',
        dataType:'json',
        data:datos,
        success:function(res){
            console.log(res); 
                           
        },
        error:function(error){
            console.error(error);
        }
    });*/

}