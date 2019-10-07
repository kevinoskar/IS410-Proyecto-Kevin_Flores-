
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
    document.getElementById("typeProduct").innerHTML+=`
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

function registrarProducto(){
    var parametros=$("#formproduct").serialize()+"&productImages="+"../../Backend/images/images/company-images/company-products-image/"+document.getElementById("productImages").files[0].name;
    console.log(parametros);
    $.ajax({
        url:'../../Backend/ajax/ajax-product/product.php?id=-Lq94a45yrOAJrwWTf',
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

