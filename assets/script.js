$(document).ready(function(){
    $('.addToCartBtn').click(function (e){
        e.preventDefault();
        var qty = $(this).closest('.product-data').find('.input-qty').val();
        var idprod = $(this).val();
        swal({
            title: "Estás seguro de agregar este producto al carrito?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((addcart) => {
            if(addcart){
                $.ajax({ 
                    type: "POST",
                    url: "functions/carrito.php",
                    data: {
                        "idprod": idprod,
                        "prod_cantidad": qty,
                        "scope": "add"
                    },
                    dataType: "json",  
                    success: function (response) {
                          console.log(response); 
                        if (response && response.status == 201) {
                            swal("¡Tu producto ha sido agregado!", {
                                icon: "success",
                            });
                        } else if (response && response.status == 401) {
                            swal("¡Inicia sesion para continuar!", {
                                icon: "error",
                            });
                        } else if (response && response.status == 500) {
                            swal("¡ALGO SALIO MAL!", {
                                icon: "error",
                            });
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                        if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                            console.error('Mensaje de error del servidor:', jqXHR.responseJSON.error);
                        }
                    }
                });
            }
        });




    });
});
