
(function(){
    $.ajax({
        url:'../../Backend/ajax/ajax-company/company.php?action=CompanyAccessKey',
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
            imprimirInformacion(res);
        },
        error:function(error){
            console.error(error);
        }
    });

}

function imprimirInformacion(company){
    $("#Data").append(`
    <button class="hearder-icons btn-profile dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>${company.nameCompany}</span>
        <img class="profile-image" src="${company.urlimageCompany}">
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../configuracion-empresa/perfil-empresa.html"><i class="fa fa-cog icon-profile-dropdown selected-sidebar"></i>Actualizar Perfil</a>
        <a class="dropdown-item" href="../visualizar-empresa/visualizar-empresa.html"><i class="fas fa-eye icon-profile-dropdown"></i></i>Visualización Perfil</a>
        <a class="dropdown-item" href="../registrar-sucursal/registrar-sucursal.html"><i class="fas fa-store icon-profile-dropdown"></i></i>Registrar Sucursal</a>
        <a class="dropdown-item" href="../registrar-promociones/registrar-promociones.html"><i class="fas fa-gift icon-profile-dropdown"></i>Registrar Promociones</a>
        <a class="dropdown-item" href="../dashboard-admin/dashboard-admin.html"><i class="fas fa-chart-bar icon-profile-dropdown"></i>Dashboard Administrativo</a>
        <a class="dropdown-item" href="../../Backend/ajax/ajax-company/company.php?action=logoutCompany"><i class="fa fa-sign-out icon-profile-dropdown"></i>Salir</a>
      </div>
    `);
    
    $("#formUpdateCompany").append(`
    <div id="dataProfile">
        <div id="Imagen" class="image-profile">
            <img class="box-profile-image" src="${company.urlimageCompany}" alt="" title="Cambiar Imagen">
        </div>
        <div id="imagen2" class="image-profile2">
            <img src="${company.urlbanner}" class="box-profile-banner" alt="" title="Cambiar Banner">
        </div>
        </div>
        <input id="urlimageCompany" name="urlimageCompany" type="file">
        <button id="buttonUpload" type="button" value="" onclick="subirImagen()">Subir Imagen</button>
        <input type="file" id="urlbanner" name="urlbanner">
        <button id="buttonUploadBanner" type="button" onclick="subirImagenBanner() ">Subir Banner</button>
        <hr class="hr1">   
        <h2>Listos para modificar tus campos.</h2>
        <h1>Datos Principales</h1>
        <table>
            <tbody class="col-md-12 col-xs-12 col-lg-12">
                <tr>
                    <td><label for="">Nombre Completo de la Empresa</label><br></td>
                    <td><input type="text" name="nameCompany" value="${company.nameCompany}" id="nameCompany"><br></td>
                </tr>
                <tr>
                    <td><label for="">Descripción</label><br></td>
                    <td><textarea name="descriptionCompany" id="descriptionCompany"cols="30" rows="5">${company.descriptionCompany}></textarea></td>
                </tr>
                <tr>
                    <td><label for="">Rubro</label><br></td>
                    <td><input type="text" id="oriented" value="${company.oriented}" name="oriented"></td>
                </tr>
                <tr>
                    <td><label for="">Fecha de Fundación</label><br></td>
                    <td><input type="date" name="fundationDate" value="${company.fundationDate}" id="fundationDate"></td>
                </tr>
                <tr>
                    <td><label for="">Correo Electroníco Empresarial</label><br></td>
                    <td><input type="text" id="emailCompany" value="${company.emailCompany}" name="emailCompany"></td>
                </tr>
                <tr>
                    <td><label for="">Contraseña</label><br></td>
                    <td><input type="text" value="" name="passwordCompany" id="passwordCompany"  ></td>
                </tr>
            </tbody>
        </table>
        <h1>Ubicación</h1>
        <table>
            <tbody class="col-md-12 col-xs-12 col-lg-12">
                <tr>
                    <td><label for="">Código Postal</label><br></td>
                    <td><input type="text" name="postalCode" value="${company.postalCode}" id="postalCode"></td>
                </tr>
                <tr>
                    <td><label for="">Pais</label><br></td>
                    <td><select name="country" value="${company.country}" id="country">
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
                    
                    </select>
                    
                    </td>
                </tr>
                <tr>
                    <td><label for="">Estado o Departamento</label><br></td>
                    <td><input type="text" value="${company.state}" name="state" id="state"  ></td>
                </tr>
                <tr>
                    <td><label for="">Dirección</label><br></td>
                    <td><input type="text" value="${company.addressCompany}" name="addressCompany" id="addressCompany"></td>
                </tr>
                <tr>
                    <td><label for="">Teléfono</label><br></td>
                    <td><input type="text" value="${company.phoneNumberCompany}" name="phoneNumberCompany" id="phoneNumberCompany"></td>
                </tr>
                <tr>
                    <td><label for="">Latitud</label><br></td>
                    <td><input type="text" value="${company.latitute}" id="latitute" name="latitute"></td>
                </tr>
                <tr>
                    <td><label for="">Longitud</label><br></td>
                    <td><input type="text" value="${company.longitude}" id="longitude" name="longitude"></td>
                </tr>
            </tbody>
        </table>
        <h1>
            Google Maps
        </h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15480.31647848449!2d-87.2208135802246!3d14.072505100000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2shn!4v1568590266578!5m2!1ses-419!2shn" width="600" height="450" frameborder="0" class="google-maps" allowfullscreen=""></iframe>
        <button onclick="saveChanges()" class="btn-save-changes form-control" type="button">Guardar Cambios</button>

    
    
    `);  

}

function saveChanges(){
    $.ajax({
        url:'../../Backend/ajax/ajax-company/company.php?action=CompanyAccessKey',
        method:'GET',
        dataType:'json',
        success:function(res){
            console.log(res); 
            saveChangesUpdated(res);
                           
        },
        error:function(error){
            console.error(error);
        }
    })
}

function saveChangesUpdated(company){
    console.log(company.keyCompany);
    var parametro=$("#formUpdateCompany").serialize()+"&urlbanner="+"../../Backend/images/company-images/company-banners/"+document.getElementById("urlbanner").files[0].name+"&urlimageCompany="+"../../Backend/images/company-images/company-profile-image/"+document.getElementById("urlimageCompany").files[0].name+"&tokenCompany="+company.tokenCompany;
    console.log(parametro);
   $.ajax({
        url:'../../Backend/ajax/ajax-company/company.php?id='+company.keyCompany,
        method:'PUT',
        dataType:'json',
        data:parametro,
        success:function(res){
            console.log(res);
        },
        error:function(error){
            console.error(error);
        }
    });

}











function subirImagen(){  
    if(document.getElementById("urlimageCompany").value==""){
        console.log("Foto no seleccionada");
        return;
    }else{
        var formData = new FormData();
        var files = $('#urlimageCompany')[0].files[0];
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
        url: 'php/uploader2.php',
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