<?php
session_start();
$_SESSION['sesionUsu'] = null;
$_SESSION['carrito'] = null;
header('Location:tienda.php');