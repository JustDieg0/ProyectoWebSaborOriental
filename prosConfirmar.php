<?php
include_once 'dao/Dao.php';
include_once 'model/DetallePedido.php';
$obj = new Dao();
$carrito = array();
$vec = array();
$usuId = 0;
$pedId = 0;
$mercado = false;
$numero = $_POST['cardNumber'];
$fecha = $_POST['expiryDate'];
$cvv = $_POST['cvv'];
if (isset($_GET['merc'])) {
    $mercado = true;
}
session_start();
if (isset($_SESSION['sesionUsu'])) {
    $usu = $_SESSION['sesionUsu'];
    $vec = $obj->buscaUsuCod($usu);
    $usuId = $vec[0];
}
if (isset($_SESSION['carrito'])) {
    $carrito = $_SESSION['carrito'];
}

try {
    $vec = $obj->buscaTarjeta($numero, $fecha, $cvv);
} catch (Exception $e) {
    $vec = array();
}

if (!empty($vec) || $mercado) {
    $vec = $obj->adiPed($usuId);
    $pedId = (int) $vec[0];
    foreach ($carrito as $key) {
        $prodId = (int) $key->getProducto();
        $can = (int) $key->getCantidad();
        $obj->adiDetalle($pedId, $prodId, $can);
    }
    $_SESSION['carrito'] = null;
    header("Location:compraRealizada.php");
} else {
    header("Location:confirmarCarrito.php?msg=fail");
}