
(function(){
    $.ajax({
        url:'../../Backend/ajax/ajax-company/company.php?action=CompanyAccessKey',
        method:'GET',
        dataType:'json',
        success:function(res){
            console.log(res); 
            userData(res);
            imprimirllaves(res);
            
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
            imprimirData(res);
            actualizarProductos(res.products,parametro);
        },
        error:function(error){
            console.error(error);
        }
    });

}

function imprimirllaves(company){
    $("#button").append(`
    <button class="btn-save-all" onclick="registrarProducto('${company.keyCompany}')" type="button"><i class="fas fa-plus"></i>Guardar Producto</button>
    `);

}


cargarTipos();



function subirImagen(){  
    if(document.getElementById("productImages").value!=""){
        var formData = new FormData();
        var files = $('#productImages')[0].files[0];
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
    document.getElementById("pictureProduct").innerHTML=`
        <img src="${res}" title="Cambiar Imagen">
    `;
}

function cargarTipos(){
    document.getElementById("productType").innerHTML=`
    <option value="">Seleccione el tipo de producto</option>
    <option value="tecnology">Tecnología</option>
    <option value="fashion">Moda/Vestuario</option>
    <option value="sports">Deportes/Vestuario o Accesorios</option>
    <option value="home">Hogar</option>
    <option value="accesories">Accesorios</option>
    <option value="electrodomestic">Electrodomésticos</option>
    `
}

function calcularPorcentaje(){
     var precio=parseFloat(document.getElementById("productPrice").value);
     var porcentaje=parseFloat(document.getElementById("productDiscountPorcentage").value);
     if(porcentaje>100){
        console.log("Porcentaje Supera el 100%");
        document.getElementById("productDiscountPorcentage").classList.remove("is-valid");
        document.getElementById("productDiscountPorcentage").classList.add("is-invalid");
        ;
     }else{
        document.getElementById("productTotalPrice").value=precio-(porcentaje/100*precio);
        document.getElementById("productDiscountPorcentage").classList.remove("is-invalid");
        document.getElementById("productDiscountPorcentage").classList.add("is-valid");
        ;
     } 
}



function registrarProducto(key){
    console.log(key);
    var parametros=$("#formproduct").serialize()+"&productImages="+"../../Backend/images/company-images/company-products-image/"+document.getElementById("productImages").files[0].name;
    console.log(parametros);
    $.ajax({
        url:'../../Backend/ajax/ajax-product/product.php?keyCompany='+key,
        method:'POST',
        dataType:'json',
        data:parametros,
        success:function(res){
            console.log(res);
        },
        error:function(error){
            console.error(error);
        }
    });

}
function imprimirData(company){
    $("#main").append(`
    <button class="hearder-icons btn-profile dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span>${company.nameCompany}</span>
    <img class="profile-image" src="${company.urlimageCompany}">
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../configuracion-empresa/perfil-empresa.php"><i class="fa fa-cog icon-profile-dropdown selected-sidebar"></i>Actualizar Perfil</a>
        <a class="dropdown-item" href="../visualizar-empresa/visualizar-empresa.html"><i class="fas fa-eye icon-profile-dropdown"></i></i>Visualización Perfil</a>
        <a class="dropdown-item" href="../registrar-sucursal/registrar-sucursal.html"><i class="fas fa-store icon-profile-dropdown"></i></i>Registrar Sucursal</a>
        <a class="dropdown-item" href="../registrar-promociones/registrar-promociones.php"><i class="fas fa-gift icon-profile-dropdown"></i>Registrar Promociones</a>
        <a class="dropdown-item" href="../dashboard-admin/dashboard-admin.html"><i class="fas fa-chart-bar icon-profile-dropdown"></i>Dashboard Administrativo</a>
        <a class="dropdown-item" href="../../Backend/ajax/ajax-company/company.php?action=logoutCompany"><i class="fa fa-sign-out icon-profile-dropdown"></i>Salir</a>
  </div>
    `);


}
function actualizarProductos(productos,keyCompany){
   for(let indice in productos){
        $.ajax({
            url:`../../Backend/ajax/ajax-product/product.php?keyCompany=${keyCompany}&idProduct=${indice}`,
            method:"GET",
            dataType:"json",
            success:function(productjson){
                console.log(productjson);
                $("#category").append(`
                <div class="card category col-md-6 col-xs-12 col-lg-4">
                    <img src="${productjson.productImages}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">${productjson.productName}</h5>
                        <p class="card-text">${productjson.productDescription}</p>
                        <h1 class="card-title2">Precio: L. ${productjson.productTotalPrice}</h1>
                        <button type="button" class="btn-delete" onclicl="borrarProducto('${indice}')">
                            <i class="fas fa-edit"></i>Eliminar Producto
                        </button>
                    </div>
                </div>`);
            },
            error:function(error){
                console.error(error);
            }
        });
   }
    
}
