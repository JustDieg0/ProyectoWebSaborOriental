<?php
include_once 'dao/Dao.php';
$obj = new Dao();
session_start();
    $name = $_POST["nombre"];
    $pass = $_POST["contraseña"];
    $email = $_POST["correo"];
    $telef = $_POST["telefono"];
    $dni = $_POST["DNI"];

    $obj->adicionarUsu($name, $email, $pass, $telef, $dni);
    $vec = $obj->buscaUsu($email);
    $_SESSION["sesionUsu"] = $vec[0];
    header("Location:tienda.php");
