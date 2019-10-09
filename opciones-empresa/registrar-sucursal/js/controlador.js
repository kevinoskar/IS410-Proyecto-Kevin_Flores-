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
    const parametro=companyjson.keyCompany;
    console.log(parametro);
    
    $.ajax({
        url:'../../Backend/ajax/ajax-company/company.php?id='+parametro,
        method:'GET',
        dataType:'json',
        success:function(res){
            console.log(res);
            agregar(res);
            imprimiroficinas(res.branchOffice,parametro)
        },
        error:function(error){
            console.error(error);
        }
    });

}
function agregar(company){
    $("#dropdown1").append(`
    <button class="hearder-icons btn-profile dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>${company.branchOfficeName}</span>
        <img class="profile-image" src="${company.branchOfficeImage}">
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../configuracion-empresa/perfil-empresa.php"><i class="fa fa-cog icon-profile-dropdown"></i>Actualizar Perfil</a>
        <a class="dropdown-item" href="../visualizar-empresa/visualizar-empresa.html"><i class="fas fa-eye icon-profile-dropdown "></i></i>Visualización Perfil</a>
        <a class="dropdown-item" href="../registrar-sucursal/registrar-sucursal.php"><i class="fas fa-store icon-profile-dropdown selected-sidebar"></i></i>Registrar Sucursal</a>
        <a class="dropdown-item" href="../registrar-promociones/registrar-promociones.phph"><i class="fas fa-gift icon-profile-dropdown"></i>Registrar Promociones</a>
        <a class="dropdown-item" href="../dashboard-admin/dashboard-admin.html"><i class="fas fa-chart-bar icon-profile-dropdown"></i>Dashboard Administrativo</a>
        <a class="dropdown-item" href="../../Backend/ajax/ajax-company/company.php?action=logoutCompany"><i class="fa fa-sign-out icon-profile-dropdown"></i>Salir</a>
    </div>
    `);

}

function registrarOficina(keyCompany){
    let parametros=$("#formBranchOffice").serialize()+"&branchOfficeImage="+"../../Backend/images/company-images/company-branch-office-image/"+document.getElementById("branchOfficeImage").files[0].name;
    console.log(parametros);
    $.ajax({
        url:'../../Backend/ajax/ajax-branchOffice/branchOffice.php?keyCompany='+keyCompany,
        method:'POST',
        dataType:'json',
        data:parametros,
        success:function(res){
            console.log(res); 
            location.reload();
            
            
        },
        error:function(error){
            console.error(error);
        }
    })
}
function imprimiroficinas(oficinas,keycompany){
    const key=keycompany;
    for(let indice in oficinas){
        $.ajax({
            url:`../../Backend/ajax/ajax-branchOffice/branchOffice.php?keyCompany=${keycompany}&idBranch=${indice}`,
            method:"GET",
            dataType:"json",
            success:function(oficinajson){
                console.log(oficinajson);
                $("#branchoffice").append(`
                <div class="branchs-office-item">
                <h1 class="title-branch-unique">Sucursal ${oficinajson.branchOfficeName}</h1>
                <div class="branchs-office-description">
                    <div class="col-md-4 col-xs-12 col-lg-12">
                        <img class="img-branchs-office" src="${oficinajson.branchOfficeImage}"> 
                    </div>
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <table>
                            <tbody>
                                <tr>
                                    <td><label >Ubicación</label></td>
                                    <td>${oficinajson.branchOfficeAddress}</td>
                                </tr>
                                <tr>
                                    <td><label >Latitud-Longitud</label></td>
                                    <td>${oficinajson.branchOfficeLatLon}</td>
                                </tr>
                                <tr>
                                    <td><label >Cantidad total de Personal</label></td>
                                    <td>${oficinajson.branchOfficeWorkers}</td>
                                </tr>
                                <tr>
                                    <td><label >Teléfono</label></td>
                                    <td>${oficinajson.branchOfficePhone}</td>
                                </tr>
                                <tr>
                                    <td><label >Correo Electrónico</label></td>
                                    <td>${oficinajson.branchOfficeEmail}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tcol-md-12 col-xs-12 col-lg-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15480.179707066367!2d-87.2128529!3d14.0745244!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbdb7f2ff72f90fc0!2sMetroMall!5e0!3m2!1ses-419!2shn!4v1568608983160!5m2!1ses-419!2shn" width="600" height="450" frameborder="0" class="google-maps" allowfullscreen=""></iframe>
                    </div>
                    <div>
                        <button type="button" onclick="borrarOficina('${indice}','${key}')" class="btn btn-danger">Borrar Oficina</button>
                        <button type="button" onclick="editarOficina('${indice}','${key}')" class="btn btn-warning">Editar Oficina</button>
                        <button type="button" onclick="actualizarOficina('${indice}','${key}')" class="btn-update btn btn-info">Actualizar</button>
                    </div>
                </div>
            </div>
                
                `);
                
            },
            error:function(error){
                console.error(error);
            }
        });
   }

}
function borrarOficina(keyBranch,keyCompany){
    $.ajax({
        url:`../../Backend/ajax/ajax-branchOffice/branchOffice.php?keyCompany=${keyCompany}&idBranch=${keyBranch}`,
        method:'DELETE',
        dataType:'json',
        success:function(res){
            console.log(res);
            location.reload();

        },
        error:function(error){
            console.error(error);
        }
    });
}
function editarOficina(keyBranch,keyCompany){
        $.ajax({
            url:`../../Backend/ajax/ajax-branchOffice/branchOffice.php?keyCompany=${keyCompany}&idBranch=${keyBranch}`,
            method:'GET',
            dataType:'json',
            success:function(res){
                console.log(res);
                $("#branchOfficeName").val(res.branchOfficeName);
                $("#branchOfficeAddress").val(res.branchOfficeAddress);
                $("#branchOfficeLatLon").val(res.branchOfficeLatLon);
                $("#branchOfficeWorkers").val(res.branchOfficeWorkers);
                $("#branchOfficePhone").val(res.branchOfficePhone);
                $("#branchOfficeEmail").val(res.branchOfficeEmail);
                $(".btn-update").show();
                $(".btn-warning").hide();

            },
            error:function(error){
                console.error(error);
            }
        });
}


































function agregar(keyCompany){
    $("#addBranchoffice").append(`
    <button type="button"  onclick="registrarOficina('${keyCompany}')"id="buttonSave">Agregar Sucursal</button>
    `);
}

function subirImagen(){  
    var formData = new FormData();
    var files = $('#branchOfficeImage')[0].files[0];
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
    document.getElementById("imagenUpload").innerHTML=`
        <img class="branch-office-image" src="${res}" alt="profile-image" title="Cambiar Imagen"></br>
    `;
}
