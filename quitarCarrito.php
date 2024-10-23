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
    $vec = array();
    foreach ($carrito as $key){
        if($carrito[$index]->getProducto() == $key->getProducto()){
        }else{
            $vec[] = $key;
        }
    }
    $carrito = $vec;

$_SESSION["carrito"] = $carrito;

header("Location:carrito.php");