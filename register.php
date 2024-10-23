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
    session_start();
    if (isset($_SESSION["msgU"])) {
        $msg = $_SESSION["msgU"];
    }
    ?>
    <div class="bg-orange-100 h-screen flex items-center">
        <div class="container flex mx-auto justify-center">
            <div class=" bg-orange-200 p-10 rounded-3xl">
                <form id="registrationForm" action="prosReg.php" method="post" class="flex flex-col">
                    <h3 class="text-center font-semibold text-2xl pb-5 text-pry-dark-brown">Formulario de Registro</h3>

                    <div class="mb-2 flex justify-between items-center">
                        <label for="nombre" class="form-label font-semibold text-lg">Nombre:</label>
                        <input id="nombre" type="text" name="nombre" placeholder="Ingresa tu nombre" required
                            class="box placeholder-orange-300 rounded-lg placeholder:font-medium p-1.5 ml-3">
                    </div>
                    <p id="nombreError" class="text-red-500 text-sm hidden">● Solo letras o espacios</p>
                    <div class="mb-2 mt-2 flex justify-between items-center">
                        <label for="correo" class="form-label font-semibold text-lg">Correo:</label>
                        <input id="correo" type="email" name="correo" placeholder="Correo Electrónico" required
                            class="box placeholder-orange-300 rounded-lg placeholder:font-medium p-1.5 ml-3">
                    </div>
                    <p id="correoError" class="text-red-500 text-sm hidden">● Ingrese un correo valido</p>

                    <div class="mb-2 mt-2 flex justify-between items-center">
                        <label for="contraseña" class="form-label font-semibold text-lg">Contraseña:</label>
                        <input id="contraseña" type="password" name="contraseña" placeholder="Contraseña" required
                            class="box placeholder-orange-300 rounded-lg placeholder:font-medium p-1.5 ml-3">
                    </div>
                    <div id="contraseñaError" class="text-red-500 hidden">
                        <div class="flex justify-around text-sm">
                            <p id="mayus" class="">● Una Mayuscula</p>
                            <p id="minus" class="">● Una minuscula</p>
                        </div>
                        <div class="flex justify-around text-sm">
                            <p id="number" class="">● Un número</p>
                            <p id="carac" class="">● Debe tener 8 caracteres</p>
                        </div>
                    </div>
                    <div class="mb-2 mt-2 flex justify-between items-center">
                        <label for="telefono" class="form-label font-semibold text-lg">Teléfono:</label>
                        <input id="telefono" type="text" name="telefono" placeholder="Coloca tu teléfono" required
                            class="box placeholder-orange-300 rounded-lg placeholder:font-medium p-1.5 ml-3"  maxlength="9">
                    </div>
                    <p id="telefonoError" class="text-red-500 text-sm hidden">● Debe contener 9 dígitos</p>

                    <div class="mb-2 mt-2 flex justify-between items-center">
                        <label for="DNI" class="form-label font-semibold text-lg">DNI:</label>
                        <input id="DNI" type="text" name="DNI" placeholder="Digita tu DNI" required
                            class="box placeholder-orange-300 rounded-lg placeholder:font-medium p-1.5 ml-3" maxlength="8">
                    </div>
                    <p id="DNIError" class="text-red-500 text-sm hidden">● Debe tener 8 dígitos</p>

                    <input id="submitBtn" type="submit" name="register" value="Regístrate ahora"
                        class="btn text-center p-3 rounded-lg font-bold text-white mt-2 mb-4 cursor-not-allowed bg-gray-500"
                        disabled>

                    <p class="text-sm text-center">¿Ya tienes una cuenta? <a href="login.php"
                            class="text-blue-600">Iniciar Sesión</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="js/val.js"></script>
</body>

</html>