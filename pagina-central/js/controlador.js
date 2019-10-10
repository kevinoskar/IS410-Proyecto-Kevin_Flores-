function b(){
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
}
function a(){
$.ajax({
    url:'../Backend/ajax/ajax-company/company.php',
    method:'GET',
    dataType:'json',
    success:function(res){
        console.log(res);  
        imprimirInformacionCompañia(res);              
    },
    error:function(error){
        console.error(error);
    }
})
}
a();
b();

function userData(usuariojson){
    const parametroUserKey=usuariojson.key;
    console.log(parametroUserKey);
    $.ajax({
        url:'../Backend/ajax/ajax-users/users.php?id='+parametroUserKey,
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
function imprimirInformacionCompañia(companyskeys){
    for(const indice in companyskeys){
        console.log("indice "+ indice);
        $.ajax({
            url:'../Backend/ajax/ajax-product/product.php?keyCompany='+indice,
            method:'GET',
            dataType:'json',
            success:function(res){
                console.log(res);
                DataProducts(res,indice);
            },
            error:function(error){
                console.error(error);
            }
        });
    }

}
function DataProducts(productsjsons,KeyCompany){
    const keyCompany=KeyCompany;
    for(let indice2 in productsjsons){
        $.ajax({
            url:'../Backend/ajax/ajax-product/product.php?keyCompany='+KeyCompany+'&idProduct='+indice2,
            method:'GET',
            dataType:'json',
            success:function(product){
                console.log(product);
                $("#productstoBuy").append(`
                <div class="product col-lg-3 col-md-4 col-xl-4 col-xs-12">
                    <div class="product-img">
                        <img src="Proyecto-IIPAC/${product.productImages}" alt="">
                        <div class="product-label">
                            <span class="sale">${product.productDiscountPorcentage}%</span>
                            <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <h3 class="product-name"><a href="#">${product.productName}</a></h3>
                        <h4 class="product-price">L${product.productTotalPrice}.00 <del class="product-old-price">L${product.productPrice}.00</del></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-btns">
                            <button onclick="guardarWishList('${indice2}')" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Agregar Lista de Deseos</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button onclick="guardarCarrito('${indice2}','${keyCompany}')" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar Carrito</button>
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





function imprimirInformacion(usuariojson){
    $("#dropdownMenuButton").append(`
    <span>${usuariojson.name}</span>
    <img class="profile-image" src="${usuariojson.urlProfileImage}">

    `);

}

function guardarCarrito(keyProduct,keyCompany){
    const keyproduct=keyProduct;
    const keyCompanySave=keyCompany
    $.ajax({
        url:'../Backend/ajax/ajax-product/product.php?keyCompany='+keyCompanySave+'&idProduct='+keyproduct,
        method:'GET',
        dataType:'json',
        success:function(res){
            const parametro=jQuery.param(res); 
            $.ajax({
                url:'../Backend/ajax/ajax-users/users.php?action=userAccessKey',
                method:'GET',
                dataType:'json',
                success:function(User){
                    console.log(User.key); 
                    $.ajax({
                        url:'../Backend/ajax/ajax-users/user-product-purchased.php?keyUser='+User.key,
                        method:'POST',
                        dataType:'json',
                        data:parametro,
                        success:function(res){
                            console.log(res); 
                            
                                           
                        },
                        error:function(error){
                            console.error(error);
                        }
                    })
            
                                   
                },
                error:function(error){
                    console.error(error);
                }
            })          
        },
        error:function(error){
            console.error(error);
        }
    })
}

