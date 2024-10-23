<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="icon" href="/images/chaufa_icon.ico">
    <title>Sabor Oriental</title>
</head>
<body>

<?php
    include_once 'dao/Dao.php';
    $obj = new Dao();
    $msg = "";
    $hd = "hidden";
    if(isset($_GET['msg'])){
    $msg = "Correo o contraseña incorrectos";
    $hd = "";
    }
?>
<div class="bg-orange-100 h-screen flex items-center">
        <div class="container flex mx-auto justify-center">
            <div class=" bg-orange-200 p-10 rounded-3xl">
                <div class="form-container">
                    <form action="prosLogin.php" class="flex flex-col" method="post">
                        <h3 class="text-center font-semibold text-2xl pb-5 text-pry-dark-brown">Iniciar Sesion</h3>
                        <input type="email" name="email" placeholder="Correo Electronico" required class="box p-3 rounded-lg placeholder-orange-300 placeholder:font-medium mb-4">
                        <input type="password"name="password" placeholder="Contraseña" required class="box p-3 rounded-lg placeholder-orange-300 placeholder:font-medium mb-4">
                        <p class="text-red-600 font-medium text-center pb-2 <?=$hd?>"><?=$msg?></p>
                        <input type="submit" name="login" value="Iniciar Sesion" class="btn text-center bg-orange-500 p-3 rounded-lg font-bold text-white mb-4">
                        <p class="text-sm">Aun no tienes una cuenta? <a href="register.php" class="text-blue-600">Registrate Ahora</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>