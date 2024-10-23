<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor Oriental</title>
    <link rel="stylesheet" href="api/dist/styles.css">
    <link rel="icon" href="api/images/chaufa_icon.ico">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>
</head>

<body>
    <?php
    include_once '../dao/Dao.php';
    $obj = new Dao();
    $dirty = 0;
    session_start();
    if (isset($_SESSION['sesionUsu'])) {
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
            <div class="gap-x-20 items-center hidden md:flex">
                <a href="#Inicio" class="hover:text-orange-700 transition-colors">Inicio</a>
                <a href="#SNosotros" class="hover:text-orange-700 transition-colors">Sobre nosotros</a>
                <a href="#Popular" class="hover:text-orange-700 transition-colors">Popular</a>
                <a href="#Reciente" class="hover:text-orange-700 transition-colors">Reciente</a>
                <?php
                if ($dirty == 0) {
                    ?>
                    <a href="./login.php" class="bg-orange-500 rounded-xl text-white p-1.5 text-base">Iniciar Sesión</a>
                    <?php
                } else {
                    ?>
                    <div class="flex flex-row items-center cursor-pointer" id="triggerDiv">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-10 h-10 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm">Bienvenido</p>
                            <p class="text-base"><?= $vec[1] ?></p>
                        </div>
                    </div>
                    <div id="popupMenu"
                        class="hidden p-4 border rounded bg-white shadow-lg transition-opacity duration-300 opacity-0 z-10 absolute">
                        <ul>
                            <li class="py-1"><a href="carrito.php" id="cartOption"
                                    class="text-orange-500 hover:text-orange-700">Carrito</a></li>
                            <li class="py-1"><a href="logout.php" id="logoutOption"
                                    class="text-orange-500 hover:text-orange-700">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="bg-orange-100 pt-52 pb-32" id="Inicio">
        <div class="container flex flex-col md:flex-row mx-auto items-center px-16">
            <div class="w-3/4 md:w-1/2 flex flex-col gap-y-7">
                <div class="flex flex-col gap-y-3 md:pl-20 text-center md:text-left items-center md:items-start">
                    <h1 class="text-5xl font-medium tracking-tighter">
                        Descubre tus gustos
                    </h1>
                    <div class="flex items-center">
                        <div>
                            <img src="./images/sarten.png" class="size-10">
                        </div>
                        <h1 class="text-5xl font-medium tracking-tighter pl-5">
                            Restaurant Chifa
                        </h1>
                    </div>
                    <h1 class="text-7xl font-semibold text-pry-dark-brown italic tracking-tighter pl-10">
                        Sabor Oriental
                    </h1>
                    <p class="mt-5 text-gray-500 w-1/2 tracking-tighter">
                        Encuentra un excelente almuerzo con los mejores platos in el restaurante y mejora tu día.
                    </p>
                </div>
                <div class="pl-24">
                    <button
                        class="bg-orange-600 text-white font-medium rounded-full py-3 px-4 text-base mt-5 hover:bg-orange-700 transition-colors"
                        onclick="window.location.href = './tienda.php'">
                        <div class="flex">
                            <p>Ordena Ahora</p>
                            <div class="pl-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <div class="w-5/6 md:w-1/2">
                <img src="./images/1.png">
            </div>
        </div>
    </div>
    <div class="bg-orange-100" id="SNosotros">
        <div class="flex flex-col md:flex-row container mx-auto items-center gap-x-20">
            <div class="w-3/4 md:w-1/2">
                <img src="./images/wantan.png">
            </div>
            <div class="w-3/4 md:w-1/2 flex items-center">
                <div class="flex flex-col gap-y-3 items-center md:items-start">
                    <p class="font-cascadia text-xl text-orange-700">Sobre nosotros</p>
                    <div class="flex items-center">
                        <h1 class="text-5xl tracking-tighter font-medium">Nosotros ofrecemos</h1>
                        <img src="./images/arroz.png" class="size-10 ml-4">
                    </div>
                    <h1 class="text-5xl tracking-tighter font-medium">Comida Saludable</h1>
                    <p class="mt-5 text-gray-500 w-5/6 md:w-1/2 tracking-tighter">
                        En Sabor Oriental, nuestra cocina es más que solo comida, es una expresión de amor por los
                        sabores auténticos y los ingredientes frescos. Nos inspira la pasión por deleitar a nuestros
                        comensales con platos cuidadosamente elaborados que capturan la esencia de la cocina casera y la
                        tradición culinaria.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-orange-100 pb-36 pt-28" id="Popular">
        <div class="container flex flex-col items-center mx-auto">
            <div class="mb-3">
                <h1 class="text-2xl text-orange-600 font-cascadia tracking-tight italic">La mejor comida</h1>
            </div>
            <div class="pb-14">
                <h1 class="text-4xl font-semibold tracking-tight">
                    Platos populares
                </h1>
            </div>
            <div class="w-4/5 flex flex-col md:flex-row justify-center gap-y-5 md:gap-x-14 items-center">
                <!--Objeto 1-->
                <div class="flex flex-col w-5/6 md:w-1/4 bg-white rounded-xl items-center gap-y-1 pb-5">
                    <div class="">
                        <img src="./images/1.png">
                    </div>
                    <h1 class="font-cascadia font-bold text-xl">Chaufa de pollo</h1>
                    <p class="text-sm text-gray-400 pb-2 tracking-tighter">Plato peruano</p>
                    <div class="flex text-center w-full justify-center gap-x-6 items-center">
                        <p class="text-orange-500 font-semibold text-lg">S/24.99</p>
                        <button class="rounded-full bg-orange-500 p-1 hover:bg-orange-800 transition-colors"
                            onclick="window.location.href = './tienda.php#Chaufa'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="white" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!--Objeto 2-->
                <div class="flex flex-col w-5/6 md:w-1/4 bg-white rounded-xl items-center gap-y-1 pb-5">
                    <div class="">
                        <img src="./images/2.png">
                    </div>
                    <h1 class="font-cascadia font-bold tracking-tighter text-xl">Chaufa Especial</h1>
                    <p class="text-sm text-gray-400 pb-2 tracking-tighter">Plato peruano</p>
                    <div class="flex text-center w-full justify-center gap-x-6 items-center">
                        <p class="text-orange-500 font-semibold text-lg">S/29.99</p>
                        <button class="rounded-full bg-orange-500 p-1 hover:bg-orange-800 transition-colors"
                            onclick="window.location.href = './tienda.php#Chaufa'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="white" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!--Objeto 3-->
                <div class="flex flex-col w-5/6 md:w-1/4 bg-white rounded-xl items-center gap-y-1 pb-5">
                    <div class="">
                        <img src="./images/3.png" class="h-48">
                    </div>
                    <h1 class="font-cascadia font-bold text-xl">Aeropuerto Especial</h1>
                    <p class="text-sm text-gray-400 pb-2 tracking-tighter">Plato oriental</p>
                    <div class="flex text-center w-full justify-center gap-x-6 items-center">
                        <p class="text-orange-500 font-semibold text-lg">S/34.99</p>
                        <button class="rounded-full bg-orange-500 p-1 hover:bg-orange-800 transition-colors"
                            onclick="window.location.href = './tienda.php#Chaufa'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="white" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-orange-100 pt-28" id="Reciente">
        <div class="container flex flex-col md:flex-row mx-auto items-center px-16">
            <div class="w-5/6 md:w-1/2 flex flex-col gap-y-7">
                <div class="flex flex-col gap-y-3 pl-0 md:pl-20 items-center md:items-start">
                    <h2 class="text-xl text-orange-600 font-cascadia tracking-tight italic pl-5">Recientemente agregado
                    </h2>
                    <h1 class="text-5xl font-medium tracking-tighter">
                        Kam Lun Wantan
                    </h1>
                    <h1 class="text-5xl font-medium tracking-tighter">
                        Extra Piña
                    </h1>
                    <p class="mt-5 text-gray-500 w-5/6 md:w-1/2 tracking-tighter">
                        Si tu dia necesita un sabor dulce pero salado este es el mejor plato para ti.
                    </p>
                </div>
                <div class="md:pl-24 flex items-center">
                    <button
                        class="bg-orange-600 text-white font-medium rounded-full py-3 px-4 text-base mt-5 hover:bg-orange-700 transition-colors"
                        onclick="window.location.href = './tienda.php#Especial'">
                        <div class="flex">
                            <p>Ordena Ahora</p>
                            <div class="pl-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <div class="w-5/6 md:w-1/2 ">
                <img src="./images/7.png">
            </div>
        </div>
    </div>
    <div class="bg-orange-100 pt-64">
        <div class="container flex flex-col items-center mx-auto">
            <div class="pb-5">
                <h1 class="text-4xl font-semibold tracking-tight font-cascadia">
                    Ahora puedes observarlos con realidad virtual
                </h1>
            </div>
            <div class="pb-14">
                <h2 class="text-xl text-orange-600 font-cascadia tracking-tight italic pl-5">Los mas representativos
                </h2>
            </div>
        </div>
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20">
                <div class="bg-white flex flex-col justify-center items-center rounded-lg">
                    <model-viewer src="3dassets/comida1.glb" ar ar-modes="scene-viewer webxr quick-look" camera-controls
                        poster="poster.webp" shadow-intensity="1.15" exposure="0.86" shadow-softness="1"
                        tone-mapping="neutral" auto-rotate class="w-64 h-64">
                        <button class="Hotspot" slot="hotspot-5"
                            data-position="-1.3784380826083122m 3.692044459047139e-7m 0.9028147441131802m"
                            data-normal="6.617444900424222e-24m 0.9999999999999962m 8.742277657347553e-8m"
                            data-visibility-attribute="visible">
                            <div class="HotspotAnnotation bg-orange-500 p-1 font-semibold text-white shadow-lg rounded-md">S/39.99</div>
                        </button>
                    </model-viewer>

                    <p class="text-center font-semibold text-2xl pb-5">Sushi fileteado</p>
                </div>
                <div class="bg-white flex flex-col justify-center items-center rounded-lg">
                    <model-viewer src="3dassets/comida2.glb" ar ar-modes="scene-viewer webxr quick-look" camera-controls
                        poster="poster.webp" shadow-intensity="1.15" exposure="0.86" shadow-softness="1"
                        tone-mapping="neutral" auto-rotate class="w-64 h-64">
                        <button class="Hotspot" slot="hotspot-3"
                            data-position="0.07826382200712573m 0.07228403484487086m -0.03027291324785386m"
                            data-normal="-0.36710075909679485m -0.4954531667413975m 0.7872503999595543m"
                            data-visibility-attribute="visible">
                            <div class="HotspotAnnotation bg-orange-500 p-1 font-semibold text-white shadow-lg rounded-md">S/29.99</div>
                        </button>
                    </model-viewer>
                    <p class="text-center font-semibold text-2xl pb-5">Arroz Chaufa</p>
                </div>
                <div class="bg-white flex flex-col justify-center items-center rounded-lg">
                <model-viewer src="3dassets/comida3.glb" ar ar-modes="scene-viewer webxr quick-look" camera-controls poster="poster.webp" shadow-intensity="1.15" exposure="0.86" shadow-softness="1" tone-mapping="neutral" auto-rotate class="w-64 h-64">
    <button class="Hotspot" slot="hotspot-1" data-position="5.566487394126865m 0.5952807068824777m -1.063836485460468m" data-normal="0m 1m 0m" data-visibility-attribute="visible">
        <div class="HotspotAnnotation bg-orange-500 p-1 font-semibold text-white shadow-lg rounded-md">S/25.99</div>
    </button>
</model-viewer>
                    <p class="text-center font-semibold text-2xl pb-5">Sushi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-orange-100 pt-64 pb-32">
        <div class="container flex flex-col md:flex-col lg:flex-row items-center justify-center mx-auto">
            <div class="pb-14">
                <h1 class="text-4xl font-normal tracking-tight text-center">
                    Encuentranos en
                </h1>
            </div>
            <div class="w-3/4 flex items-center justify-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!4v1720500533262!6m8!1m7!1sDv8ggIGbVTN6b3qznxqRMg!2m2!1d-12.00726529341626!2d-77.00844432921596!3f143.01967097244224!4f5.418619215811788!5f0.7820865974627469"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="block md:hidden lg:hidden"></iframe>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!4v1720501567468!6m8!1m7!1sDv8ggIGbVTN6b3qznxqRMg!2m2!1d-12.00726529341626!2d-77.00844432921596!3f143.01967097244224!4f5.418619215811788!5f0.7820865974627469"
                    width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="hidden md:block lg:block"></iframe>
            </div>
        </div>
    </div>
    <div class="bg-pry-dark-brown text-white pt-20 pb-10">
        <div class="container flex flex-col md:flex-row m-auto justify-around items-center gap-y-5">
            <!--Main Menu-->
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h1 class="text-lg pb-5 font-medium">Menu Principal</h1>
                <div class="flex flex-col gap-3 text-base">
                    <a class="hover:text-pry-light-brown hover:font-medium transition-colors">Acerca de</a>
                    <a class="hover:text-pry-light-brown hover:font-medium transition-colors">Menus</a>
                    <a class="hover:text-pry-light-brown hover:font-medium transition-colors">Ofertas</a>
                    <a class="hover:text-pry-light-brown hover:font-medium transition-colors">Eventos</a>
                </div>
            </div>
            <!--Information-->
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h1 class="text-lg pb-5 font-medium">Información</h1>
                <div class="flex flex-col gap-3 text-base">
                    <a class="hover:text-pry-light-brown hover:font-medium transition-colors">Contacto</a>
                    <a class="hover:text-pry-light-brown hover:font-medium transition-colors">Pedidos</a>
                    <a class="hover:text-pry-light-brown hover:font-medium transition-colors">Videos</a>
                    <a class="hover:text-pry-light-brown hover:font-medium transition-colors">Reservas</a>
                </div>
            </div>
            <!--Dirección-->
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h1 class="text-lg pb-5 font-medium">Dirección</h1>
                <div class="flex flex-col gap-3 text-base">
                    <p>Av. Los Jardines 9876<br>
                        Lima 4567, Perú
                    </p>
                    <p>10AM - 11PM</p>
                </div>
            </div>
            <!--Redes Sociales-->
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h1 class="text-lg pb-5 font-medium">Social media</h1>
                <div class="flex gap-7">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30"
                        class="fill-white hover:fill-pry-light-brown transition-colors">
                        <path
                            d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30"
                        class="fill-white hover:fill-pry-light-brown transition-colors">
                        <path
                            d="M28,6.937c-0.957,0.425-1.985,0.711-3.064,0.84c1.102-0.66,1.947-1.705,2.345-2.951c-1.03,0.611-2.172,1.055-3.388,1.295 c-0.973-1.037-2.359-1.685-3.893-1.685c-2.946,0-5.334,2.389-5.334,5.334c0,0.418,0.048,0.826,0.138,1.215 c-4.433-0.222-8.363-2.346-10.995-5.574C3.351,6.199,3.088,7.115,3.088,8.094c0,1.85,0.941,3.483,2.372,4.439 c-0.874-0.028-1.697-0.268-2.416-0.667c0,0.023,0,0.044,0,0.067c0,2.585,1.838,4.741,4.279,5.23 c-0.447,0.122-0.919,0.187-1.406,0.187c-0.343,0-0.678-0.034-1.003-0.095c0.679,2.119,2.649,3.662,4.983,3.705 c-1.825,1.431-4.125,2.284-6.625,2.284c-0.43,0-0.855-0.025-1.273-0.075c2.361,1.513,5.164,2.396,8.177,2.396 c9.812,0,15.176-8.128,15.176-15.177c0-0.231-0.005-0.461-0.015-0.69C26.38,8.945,27.285,8.006,28,6.937z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30"
                        class="fill-white hover:fill-pry-light-brown transition-colors">
                        <path
                            d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="container flex m-auto justify-center pt-10">
            <div class="flex items-center">
                <img src="images/chaufa_icon.png" class="size-20">
                <h1 class="text-5xl font-medium text-pry-light-brown italic pt-3 pl-6">Sabor Oriental</h1>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/popup.js"></script>
    <script>
        $(document).ready(function () {
            $("a").on('click', function (event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {
                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>
</body>