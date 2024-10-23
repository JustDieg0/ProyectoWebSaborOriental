<?php
session_start();
if($_SESSION["msgU"] != ""){
    header("Location:login.php");
}