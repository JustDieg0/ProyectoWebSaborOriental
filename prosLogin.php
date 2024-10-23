<?php
include_once 'dao/Dao.php';
$obj = new Dao();
session_start();
$email = $_POST["email"];
$contra = $_POST["password"];
try {
    $vec = $obj->buscaUsu($email);
} catch (Exception $e) {
    $vec = array();
}
if (empty($vec)) {
    header("Location:login.php?msg=fail");
} else {
    if ($vec[3] === $contra) {
        $_SESSION["sesionUsu"] = $vec[0];
        header("Location:tienda.php");
    } else {
        header("Location:login.php?msg=fail");
    }
}