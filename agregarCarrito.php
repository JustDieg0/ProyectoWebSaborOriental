<?php

include_once 'dao/Dao.php';
include_once 'model/DetallePedido.php';

$obj = new Dao();
$id = $_REQUEST["id"];
$dirty = 0;
$index = 0;
session_start();
$carrito = array();
$producto = $obj->buscarProductosId($id);

$i = 0;
if (isset($_SESSION["carrito"])){
    $carrito = $_SESSION["carrito"];
}
foreach ($carrito as $key){
    if($id == $key->getProducto()){
        $dirty = 1;
        $index = $i;
    }
    $i++;
}
if($dirty == 1){
    $can = $carrito[$index]->getCantidad();
    $carrito[$index]->setCantidad($can+1);
}else{
    $carrito[] = new DetallePedido($id,1);
}
$_SESSION["carrito"] = $carrito;

header("Location:carrito.php");