<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor Oriental</title>
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="icon" href="./images/chaufa_icon.ico">
</head>

<body class="bg-orange-100">
    <?php
        require __DIR__.'/vendor/autoload.php';
        include_once 'dao/Dao.php';
        include_once 'model/DetallePedido.php';
        $obj = new Dao();
        $dirty = 0;
        $carrito = array();
        $detalle = new DetallePedido(0,0);
        $total = 0;
        session_start();
        if (isset($_SESSION['sesionUsu'])){
            $usu = $_SESSION['sesionUsu'];
            $vec = $obj->buscaUsuCod($usu);
            $dirty = 1;
        }
        if (isset($_SESSION['carrito'])){
            $carrito = $_SESSION['carrito'];
        }
        
    ?>
    <div class=" bg-orange-200 shadow-md fixed z-10 w-full">
        <div class="container flex mx-auto justify-between py-4 items-center font-semibold text-orange-950 text-lg">
            <div class="flex items-center">
                <div>
                    <img src="./images/chaufa_icon.png" class="size-8">
                </div>
                <div class="pl-5">
                    Sabor Oriental
                </div>
            </div>
            <div class="flex gap-x-20 items-center">
                <a href="./index.php" class="hover:text-orange-700 transition-colors">Inicio</a>
                <a href="./tienda.php" class="hover:text-orange-700 transition-colors">Tienda</a>
                <?php
                    if($dirty==0){
                        ?>
                        <a href="./login.php" class="bg-orange-500 rounded-xl text-white p-1.5 text-base">Iniciar Sesión</a>
                        <?php
                    }else{
                        ?>
                        <div class="flex flex-row items-center cursor-pointer" id="triggerDiv">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm">Bienvenido</p>
                                <p class="text-base"><?=$vec[1]?></p>
                            </div>
                        </div>
                        <div id="popupMenu" class="hidden p-4 border rounded bg-white shadow-lg transition-opacity duration-300 opacity-0 z-10 absolute">
                            <ul>
                                <li class="py-1"><a href="carrito.php" id="cartOption" class="text-orange-500 hover:text-orange-700">Carrito</a></li>
                                <li class="py-1"><a href="logout.php" id="logoutOption" class="text-orange-500 hover:text-orange-700">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="bg-orange-100 pt-28 pb-10">
        <div class="container flex mx-auto flex-col">
            <div class="text-center mb-10">
                <h1 class="text-center font-semibold text-4xl pb-5 text-pry-dark-brown">Carrito de compras</h1>
            </div>
            <div class="flex justify-center">
                <table class="w-full bg-white rounded-2xl text-center table">
                    <thead class="text-xl">
                        <th>Cantidad
                        <th>Imagen
                        <th>Comida
                        <th>Precio
                        <th>Total
                    </thead>
                    <tbody class="font-medium">
                    <?php
                        foreach ($carrito as $key){
                        $detalle = $key;
                        $prodid = $detalle->getProducto();
                        
                        $vecprod = $obj->buscarProductosId($prodid);
                    ?>
                        <tr class="border-y-4 border-slate-100">
                            <td><div class="flex items-center justify-center gap-x-6"><a class="w-min h-min bg-orange-500 px-1.5 rounded text-white font-semibold" href="agregarCarrito.php?id=<?=$prodid?>">+</a>x<?=$detalle->getCantidad()?><a class="w-min h-min bg-orange-500 px-1.5 rounded text-white font-semibold" href="restarCarrito.php?id=<?=$prodid?>">-</a></div></td>
                            <td class="flex justify-center"><img src="./images/<?=$vecprod[0]?>.png" class="h-28"></td>
                            <td><?=$vecprod[1]?></td>
                            <td>S/<?=$vecprod[2]?></td>
                            <td>S/<?=$vecprod[2]*$detalle->getCantidad()?></td>
                            <td><a class="btn text-center bg-orange-500 p-2 rounded-lg font-semibold text-white tracking-wider" href="quitarCarrito.php?id=<?=$prodid?>">Eliminar</a></td>
                        </tr>
                    <?php
                        $total = $total + $vecprod[2] * $detalle->getCantidad();
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <td colspan="3"></td>
                        <td>Total a pagar:</td>
                        <td>S/<?=$total?></td>
                    </tfoot>
                </table>
            </div>
            <div class="flex justify-between">
                <div class="mt-8 flex items-center">
                <a class="btn text-center bg-orange-500 p-2 rounded-lg font-semibold text-white tracking-wider ml-4" href="confirmarCarrito.php">Pagar</a>
                <a class="btn text-center bg-white p-1.5 rounded-lg font-semibold text-orange-600 tracking-wider border-2 border-orange-600 ml-4" href="tienda.php">Seguir comprando</a>
                </div>
                <div id="wallet_container"></div>
            </div>
        </div>
    </div>
<?php
    $access_token='APP_USR-6022259007936276-070216-673925a85b437947d0f5b3167b5462d1-1881035583';
    use MercadoPago\MercadoPagoConfig;
    use MercadoPago\Client\Preference\PreferenceClient;
    MercadoPagoConfig::setAccessToken($access_token);
    $client = new PreferenceClient();
    $backUrls = [
        "success" => "http://localhost/IHMProyecto/prosConfirmar.php?merc=1",
        "failure" => "http://localhost/IHMProyecto/carrito.php",
        "pending" => "http://localhost/IHMProyecto/carrito.php"
    ];
    $preference = $client->create([
    "items"=> [
        [
        "id" => "Venta",
        "title" => "Carrito de compras IHM",
        "quantity" => 1,
        "unit_price" => (double)$total
        ],
    ],
        "statement_descriptor" => "Tienda IHM Proyecto",
        "external_reference" => "Venta",
    "back_urls" => $backUrls,
    "auto_return" => "approved",
    ]);
?>
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('APP_USR-b6fe2348-84d7-4fb4-a31f-fb18eb05cced',{
        locale: 'es-PE'
    });
    const bricksBuilder = mp.bricks();
    
    mp.bricks().create("wallet", "wallet_container", {
    initialization: {
        preferenceId: "<?php echo $preference->id;?>",
        redirectMode: 'modal'
        
    },
    customization: {
        checkout:{
            theme:{
                elementsColor: "#f97316",
                headerColor: "#f97316",
            },
        },
    texts: {
        action:'buy',
        valueProp: 'security_details',
    },
    },
    });

</script>
    <script src="js/popup.js"></script>
</body>
</html>