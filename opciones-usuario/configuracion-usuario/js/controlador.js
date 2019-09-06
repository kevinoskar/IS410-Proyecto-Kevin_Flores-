
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