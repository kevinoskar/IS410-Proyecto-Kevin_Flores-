
cargarTipos();

function subirImagen(){  
    if(document.getElementById("urlImage").value!=""){
        var formData = new FormData();
        var files = $('#urlImage')[0].files[0];
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
    <option onclick="anexarEspecificaciones(this.value)" value="">Seleccione el tipo de producto</option>
    <option onclick="anexarEspecificaciones(this.value)" value="tecnology">Tecnología</option>
    <option onclick="anexarEspecificaciones(this.value)" value="fashion">Moda/Vestuario</option>
    <option onclick="anexarEspecificaciones(this.value)" value="sports">Deportes/Vestuario o Accesorios</option>
    <option onclick="anexarEspecificaciones(this.value)" value="home">Hogar</option>
    <option onclick="anexarEspecificaciones(this.value)" value="accesories">Accesorios</option>
    <option onclick="anexarEspecificaciones(this.value)" value="electrodomestic">Electrodomésticos</option>
    `
    document.getElementById("imageProduct").innerHTML+=`
    <h1>Imagen del Producto</h1>
    <select id="sizePictures">
        <option onclick="agregarCantidadImagenes(this.value)" value="">¿Cúantas imágenes quiéres subir?</option>
        <option onclick="agregarCantidadImagenes(this.value)" value="1">Una imagen</option>
        <option onclick="agregarCantidadImagenes(this.value)" value="2">Dos imágenes</option>
        <option onclick="agregarCantidadImagenes(this.value)" value="3">Tres imágenes</option>
        <option onclick="agregarCantidadImagenes(this.value)" value="4">Cuatro imágenes</option>
        <option onclick="agregarCantidadImagenes(this.value)" value="5">Cinco imágenes</option>
    </select>
    <div id=""
    `;

}
function calcularPorcentaje(){
     var precio=parseFloat(document.getElementById("salePrice").value);
     var porcentaje=parseFloat(document.getElementById("saleDiscountPercentage").value);
     if(porcentaje>100){
        console.log("Porcentaje Supera el 100%");
        document.getElementById("saleDiscountPercentage").classList.remove("is-valid");
        document.getElementById("saleDiscountPercentage").classList.add("is-invalid");
        ;
     }else{
        document.getElementById("saleDiscount").value=precio-(porcentaje/100*precio);
        document.getElementById("saleDiscountPercentage").classList.remove("is-invalid");
        document.getElementById("saleDiscountPercentage").classList.add("is-valid");
        ;
     } 
}
function anexarEspecificaciones(tipo){
    document.getElementById("especification").innerHTML="";
    console.log("La categoria seleccionada fue: "+tipo);
    if(tipo=="fashion" || tipo=="accesories" || tipo=="sports"){
        document.getElementById("especification").innerHTML+=`
        <h1>Características específicas</h1>
        <h1>Talla-Size</h1>
        <div id="sizes" >
            <input type="checkbox" value="S">Small (Corta)</br>
            <input type="checkbox" value="M">Medium (Mediana)</br>
            <input type="checkbox" value="L">Large (Larga)</br>
            <input type="checkbox" value="XL"> Extra Large (Extra Larga)</br>
        </div>
        <h1>Color</h1>
        <div id="color" multiple="multiple">
            <input type="checkbox" value="black">Negro</br>
            <input type="checkbox" value="white">Blanco</br>
            <input type="checkbox" value="blue">Azul</br>
            <input type="checkbox" value="red">Rojo</br>
            <input type="checkbox" value="yellow">Amarillo</br>
            <input type="checkbox" value="orange">Naranja</br>
            <input type="checkbox" value="silver">Plateado</br>
            <input type="checkbox" value="gold">Dorado</br>
        </div>
        <h1>Sexo</h1>
            <input type="checkbox" id="F">Femenino
            <input type="checkbox" id="M">Masculino
            <input type="checkbox" id="Bi">Ambos sexos
        `
        ;
    }else{
        document.getElementById("especification").innerHTML+=
        `   <h1>Tamaño</h1>
                <input type="text" id="" placeholder="Altura en metros">
                <input type="text" id="" placeholder="Anchura en metros">
                <input type="text" id="" placeholder="Profundad metros">
            <h1>Colores de Carcasa</h1>
            <div id="colorBox">
                <input type="checkbox" value="black">Negro</br>
                <input type="checkbox" value="white">Blanco</br>
                <input type="checkbox" value="gold">Dorado</br>
                <input type="checkbox" value="silver">Plateado</br>
            </div>
        `};
}
function agregarCantidadImagenes(cantidad){
    document.getElementById("imagenFileUpload").innerHTML="";
    for(let i=0;i<cantidad;i++){
            document.getElementById("imagenFileUpload").innerHTML+=`
            <input type="file" id="urlImage">
            <div class="see-picture" id="pictureProduct">
                <img src="img/background-banner-example.jpg" alt="">
            </div>
            <button type="button" class="btn-save-changes" onclick="subirImagen()">Subir Imagen</button></br>
    
            `;
            $(".see-picture").css("width","25%");  

    } 

}