
function b(){
    $.ajax({
        url:'../../Backend/ajax/ajax-users/users.php?action=userAccessKey',
        method:'GET',
        dataType:'json',
        success:function(res){
            console.log(res); 
            printinfo(res)
                           
        },
        error:function(error){
            console.error(error);
        }
    })
}
function printinfo(user){
    const userkey=user.key; 
    $.ajax({
        url:'../../Backend/ajax/ajax-users/users.php?id='+userkey,
        method:'GET',
        dataType:'json',
        success:function(res){
            console.log(res); 
            Encabezado(res)
            Imprimir(res,userkey)
                           
        },
        error:function(error){
            console.error(error);
        }
    })
}
b();

function Encabezado(user){
    $("#dropdown").append(`
    
    <button class="hearder-icons btn-profile dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>${user.name}</span>
        <img class="profile-image" src="../${user.urlProfileImage}">
    </button>
    `);

}

function Imprimir(userjson,keyUser){
    for( let indice in userjson.productsPurchased){
        $.ajax({
            url:'../../Backend/ajax/ajax-users/user-product-purchased.php?keyUser='+keyUser+"&keyProductUser="+indice,
            method:'GET',
            dataType:'json',
            success:function(productUser){
                console.log(productUser); 
                $("#buys").append(`
                <div class="card mb-3 ml-2">
                    <div class="row no-gutters">
                        <div class="col-md-6 col-xl-6 col-lg-6 col-xs-12">
                            <img src="${productUser.productImages}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-6 col-xl-6 col-lg-6 col-xs-12">
                            <div class="card-body">
                                <h5 class="card-title">${productUser.productName}</h5>
                                <p class="card-text">${productUser.productDescription}</p>            
                                <p class="card-text">Costo:<small class="text-muted">L${productUser.productTotalPrice}.00</small></p>
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
}