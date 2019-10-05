(function(){
    $.ajax({
        url:'../Backend/ajax/ajax-users/users.php?action=userAccessKey',
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
        url:'../Backend/ajax/ajax-users/users.php?id='+parametro,
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


function imprimirInformacion(usuariojson){
    $("#dropdownMenuButton").append(`
    <span>${usuariojson.name}</span>
    <img class="profile-image" src="${usuariojson.urlProfileImage}">

    `);
};
