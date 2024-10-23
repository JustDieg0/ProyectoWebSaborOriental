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
        $obj = new Dao();
        $dirty = 0;
        session_start();
        if (isset($_SESSION['sesionUsu'])){
            $usu = $_SESSION['sesionUsu'];
            $vec = $obj->buscaUsuCod($usu);
            $dirty = 1;
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
</div>
<div class="bg-orange-100 flex items-center justify-center h-screen flex-col">
<svg fill="#170C00" class="w-36 h-36" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 512 512" xml:space="preserve" stroke-width="6" stroke="#170C00">
<g>
	<path d="M474.045,173.813c-4.201,1.371-6.494,5.888-5.123,10.088c7.571,23.199,11.411,47.457,11.411,72.1
		c0,62.014-24.149,120.315-68,164.166s-102.153,68-164.167,68s-120.316-24.149-164.167-68S16,318.014,16,256
		S40.149,135.684,84,91.833s102.153-68,164.167-68c32.889,0,64.668,6.734,94.455,20.017c28.781,12.834,54.287,31.108,75.81,54.315
		c3.004,3.239,8.066,3.431,11.306,0.425c3.24-3.004,3.43-8.065,0.426-11.306c-23-24.799-50.26-44.328-81.024-58.047
		C317.287,15.035,283.316,7.833,248.167,7.833c-66.288,0-128.608,25.813-175.48,72.687C25.814,127.392,0,189.712,0,256
		c0,66.287,25.814,128.607,72.687,175.479c46.872,46.873,109.192,72.687,175.48,72.687s128.608-25.813,175.48-72.687
		c46.873-46.872,72.687-109.192,72.687-175.479c0-26.332-4.105-52.26-12.201-77.064
		C482.762,174.736,478.245,172.445,474.045,173.813z"/>
	<path d="M504.969,83.262c-4.532-4.538-10.563-7.037-16.98-7.037s-12.448,2.499-16.978,7.034l-7.161,7.161
		c-3.124,3.124-3.124,8.189,0,11.313c3.124,3.123,8.19,3.124,11.314-0.001l7.164-7.164c1.51-1.512,3.52-2.344,5.66-2.344
		s4.15,0.832,5.664,2.348c1.514,1.514,2.348,3.524,2.348,5.663s-0.834,4.149-2.348,5.663L217.802,381.75
		c-1.51,1.512-3.52,2.344-5.66,2.344s-4.15-0.832-5.664-2.348L98.747,274.015c-1.514-1.514-2.348-3.524-2.348-5.663
		c0-2.138,0.834-4.149,2.351-5.667c1.51-1.512,3.52-2.344,5.66-2.344s4.15,0.832,5.664,2.348l96.411,96.411
		c1.5,1.5,3.535,2.343,5.657,2.343s4.157-0.843,5.657-2.343l234.849-234.849c3.125-3.125,3.125-8.189,0-11.314
		c-3.124-3.123-8.189-3.123-11.313,0L212.142,342.129l-90.75-90.751c-4.533-4.538-10.563-7.037-16.98-7.037
		s-12.448,2.499-16.978,7.034c-4.536,4.536-7.034,10.565-7.034,16.977c0,6.412,2.498,12.441,7.034,16.978l107.728,107.728
		c4.532,4.538,10.563,7.037,16.98,7.037c6.417,0,12.448-2.499,16.977-7.033l275.847-275.848c4.536-4.536,7.034-10.565,7.034-16.978
		S509.502,87.794,504.969,83.262z"/>
</g>
</svg>
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-4 text-pry-dark-brown pt-10 pb-10">Compra realizada</h1>
        <div class="space-x-4">
            <a href="index.php" class="btn text-center bg-orange-500 p-2 rounded-lg font-semibold text-white tracking-wider">Regresar al inicio</a>
            <a href="tienda.php" class="btn text-center bg-orange-500 p-2 rounded-lg font-semibold text-white tracking-wider">Seguir comprando</a>
        </div>
    </div>
</div>
</body>
</html>