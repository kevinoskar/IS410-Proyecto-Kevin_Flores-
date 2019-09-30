
function subirImagen(){  
    var formData = new FormData();
    var files = $('#uploadImageBranch')[0].files[0];
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
        <img class="branch-office-image" src="${res}" alt="profile-image" title="Cambiar Imagen"></br>
        <input type="file" id="uploadImageBranch"><br>
        <button type="button" id="buttonUpload" onclick="subirImagen()">Subir Imagen</button>
    `;
}
