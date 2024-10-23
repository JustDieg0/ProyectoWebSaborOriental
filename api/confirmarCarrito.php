<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor Oriental</title>
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="icon" href="/images/chaufa_icon.ico">
</head>
<body>
<?php
        include_once 'dao/Dao.php';
        include_once 'model/DetallePedido.php';
        $obj = new Dao();
        $dirty = 0;
        $carrito = array();
        $detalle = new DetallePedido(0,0);
        $total = 0;
        $hd = 'hidden';
        session_start();
        if (isset($_SESSION['sesionUsu'])){
            $usu = $_SESSION['sesionUsu'];
            $vec = $obj->buscaUsuCod($usu);
            $dirty = 1;
        }
        if (isset($_SESSION['carrito'])){
            $carrito = $_SESSION['carrito'];
        }

        if (isset($_GET['msg'])){
            $hd = '';
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
    <div class="bg-orange-100 h-screen flex">
        <div class="container flex items-center mx-auto">
            <div class="w-1/3">
                <div class="bg-white p-10 rounded-3xl">
                    <div class="pb-5">
                        <h1 class="text-center font-semibold text-3xl">Carrito Actual</h1>
                    </div>
                    <div class="min-h-96">
                        <table class="w-full text-gray-400 font-normal">
                            <?php
                                foreach ($carrito as $key){
                                    $detalle = $key;
                                    $prodid = $detalle->getProducto();
                                    
                                    $vecprod = $obj->buscarProductosId($prodid);
                            ?>
                            <tr>
                                <td>x<?=$detalle->getCantidad()?> <?=$vecprod[1]?></td><td class="text-right"><?=$vecprod[2]*$detalle->getCantidad()?></td>
                            </tr>
                            <?php
                                $total = $total + $vecprod[2] * $detalle->getCantidad();
                                }
                            ?>
                        </table>
                    </div>
                    <div class="w-full h-0.5 bg-gray-400 rounded"></div>
                    <table class="w-full text-gray-400 font-semibold">
                        <tr>
                            <td>Total:</td><td class="text-right"><?=$total?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="w-2/3 flex justify-center">
                <form class="space-y-4 bg-white w-1/2 p-10 rounded-xl" action="prosConfirmar.php" method="post">
                <h1 class="text-2xl font-semibold text-center">Ingrese una tarjeta</h1>
                    <div class="flex flex-col">
                        <label for="name" class="text-lg font-medium">Nombre del Titular</label>
                        <input type="text" id="name" name="name" placeholder="Nombre del Titular" required class="mt-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <p id="nombreError" class="text-red-500 text-sm">● Ingrese un nombre valido</p>
                    <div class="flex flex-col">
                        <label for="cardNumber" class="text-lg font-medium">Número de la Tarjeta</label>
                        <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" required class="mt-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" maxlength="19">
                    </div>
                    <p id="tarjetaError" class="text-red-500 text-sm">● Ingrese una tarjeta valida</p>
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <label for="expiryDate" class="text-lg font-medium">Fecha de Expiración</label>
                            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required class="mt-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-600 w-full">
                        </div>
                        <div class="flex-1">
                            <label for="cvv" class="text-lg font-medium">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder="123" required class="mt-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-600 w-full">
                        </div>
                    </div>
                    <p id="fechaError" class="text-red-500 text-sm">● Ingrese una fecha valida</p>
                    <p class="text-red-500 text-sm <?=$hd?>">La tarjeta ingresada no existe</p>
                    <button id="submitBtn" type="submit" class="w-full text-white p-3 rounded-lg font-semibold focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-opacity-50">Enviar</button>
                </form>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 m-2">
        <p class="text-sm text-black p-1.5 select-none">Tarjeta de prueba num:1234 5678 9012 3456 exp: 12/29 cvv: 123</p>
        </div>
    </div>
    
    <script src="js/valCd.js"></script>
</body>
</html>