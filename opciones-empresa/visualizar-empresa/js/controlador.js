function a(){
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

}
a();
function userData(companyjson){
    console.log(companyjson.keyCompany);
    const keyCompany=companyjson.keyCompany
    $.ajax({
        url:'../../Backend/ajax/ajax-company/company.php?id='+companyjson.keyCompany,
        method:'GET',
        dataType:'json',
        success:function(company){
            console.log(company);
            $("#companyVisual").append(`
            <div class="col-md-3 col-xs-12 col-lg-12">
                <div class="section-profile">
                    <div class="profile-picture-logo">
                            <img src="${company.urlimageCompany}">
                    </div>
                    <div class="profile-picture">
                        <img src="${company.urlbanner}" alt="">
                    </div>
                </div>
                <div class="descriptionCompany">
                    <h1>Descripción</h1>
                    <h2>${company.nameCompany}</h2>
                    <label>${company.descriptionCompany}</label>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <label>${company.oriented}</label></br>
                                    <label>Fecha de Fundación ${company.fundationDate}</label></br>
                                    <label>Código Postal ${company.postalCode}</label></br>
                                    <label>Pais	${company.country}</label></br>
                                    <label>Estado o Departamento ${company.state}</label></br>
                                    <label>Dirección ${company.addressCompany}</label></br>
                                    <label>Teléfono ${company.phoneNumberCompany}</label></br>
                                    <label>Latitud = ${company.latitute} Longitud = ${company.longitude}</label></br>
                                </td>
                                <td>
                                        <iframe class="google-maps" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15480.31647848449!2d-87.2208135802246!3d14.072505100000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2shn!4v1569123241819!5m2!1ses-419!2shn" width="600" height="450" frameborder="0" allowfullscreen=""></iframe>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            `);
            $("#dropdown").append(`
            <button class="hearder-icons btn-profile dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>${company.nameCompany}</span>
                <img class="profile-image" src="${company.urlimageCompany}">
            </button>
            `)
            for(let indice in company.branchOffice){
                $.ajax({
                    url:'../../Backend/ajax/ajax-branchOffice/branchOffice.php?keyCompany='+keyCompany+"&idBranch="+indice,
                    method:'GET',
                    dataType:'json',
                    success:function(branch){
                        console.log(branch); 
                        $("#branchData").append(`
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="branchs-office-item">
                                <h1 class="title-branch-unique">Sucursal ${branch.branchOfficeName}</h1>
                                <div class="branchs-office-description">
                                    <div class="col-md-4 col-xs-12 col-lg-12">
                                        <img class="img-branchs-office" src="${branch.branchOfficeImage}"> 
                                    </div>
                                    <div class="col-md-12 col-xs-12 col-lg-12">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td><label >Ubicación</label></td>
                                                    <td>${branch.branchOfficeAddress}</td>
                                                </tr>
                                                <tr>
                                                    <td><label >Latitud-Longitud</label></td>
                                                    <td>${branch.branchOfficeLatLon}</td>
                                                </tr>
                                                <tr>
                                                    <td><label >Cantidad total de Personal</label></td>
                                                    <td>${branch.branchOfficeWorkers}</td>
                                                </tr>
                                                <tr>
                                                    <td><label >Teléfono</label></td>
                                                    <td>${branch.branchOfficePhone}</td>
                                                </tr>
                                                <tr>
                                                    <td><label >Correo Electrónico</label></td>
                                                    <td>${branch.branchOfficeEmail}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tcol-md-12 col-xs-12 col-lg-12">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15480.179707066367!2d-87.2128529!3d14.0745244!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbdb7f2ff72f90fc0!2sMetroMall!5e0!3m2!1ses-419!2shn!4v1568608983160!5m2!1ses-419!2shn" width="600" height="450" frameborder="0" class="google-maps2" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        `);
                        
                    },
                    error:function(error){
                        console.error(error);
                    }
                })
            }


        },
        error:function(error){
            console.error(error);
        }
    });

}