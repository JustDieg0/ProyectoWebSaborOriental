<?php

include_once 'connection/Conexion.php';

class Dao{
    function mostrarProductosCategoria($cate){
        $obj = new Conexion();
        $sql = "SELECT Id,Descripcion,Precio,Categoria FROM productos WHERE Categoria='$cate'";
        $res = mysqli_query($obj->conecta(), $sql)or die(mysqli_error($obj->conecta()));
        $vec = array();
        while($f= mysqli_fetch_array($res)){
            $vec[]=$f;
        }
        return $vec;
    }

    function buscarProductosId($id){
        $obj = new Conexion();
        $sql = "SELECT Id,Descripcion,Precio,Categoria FROM productos WHERE Id='$id'";
        $res = mysqli_query($obj->conecta(), $sql)or die(mysqli_error($obj->conecta()));
        $vec = array();
        if(mysqli_num_rows($res)>0){
            $vec = mysqli_fetch_array($res);
        }
        return $vec;
    }

    function buscaUsu($mail){
        $obj = new Conexion();
        $sql = "select Id,Nombre,Correo,Contraseña,Telefono,Dni from clientes where Correo='$mail'";
        $res = mysqli_query($obj->conecta(), $sql)or die(mysqli_error($obj->conecta()));
        $vec = array();
        if(mysqli_num_rows($res)>0){
            $vec = mysqli_fetch_array($res);
        }
        return $vec;
    }

    function adicionarUsu($name,$email,$pass,$telef,$dni){
        $obj = new Conexion();
        $sql = "call sp_adicionarCli('$name','$email','$pass','$telef','$dni')";
        mysqli_query($obj->conecta(), $sql)or die(mysqli_error($obj->conecta()));
    }

    function buscaUsuCod($cod){
        $obj = new Conexion();
        $sql = "select * from clientes where Id=$cod";
        $res = mysqli_query($obj->conecta(), $sql)or die(mysqli_error($obj->conecta()));
        $vec = array();
        if(mysqli_num_rows($res)>0){
            $vec = mysqli_fetch_array($res);
        }
        return $vec;
    }

    function adiPed($clienteId){
        $obj = new Conexion();
        $sql = "call sp_adiPed($clienteId,@nuevoId)";
        mysqli_query($obj->conecta(), $sql)or die(mysqli_error($obj->conecta()));
        $sql = "select @nuevoId AS nuevoId";
        $res = mysqli_query($obj->conecta(), $sql)or die(mysqli_error($obj->conecta()));
        $vec = array();
        if(mysqli_num_rows($res)>0){
            $vec = mysqli_fetch_array($res);
        }
        return $vec;
    }

    function adiDetalle($ped,$prod,$can){
        $obj = new Conexion();
        $sql = "call sp_adiDetalle($ped,$prod,$can)";
        mysqli_query($obj->conecta(), $sql)or die(mysqli_error($obj->conecta()));
    }

    function buscaTarjeta($numero, $fecha, $cvv){
        $obj = new Conexion();
        $sql = "select * FROM tarjetas WHERE numero = '$numero' AND fecha = '$fecha' AND cvv = '$cvv'";
        $res = mysqli_query($obj->conecta(), $sql)or die(mysqli_error($obj->conecta()));
        $vec = array();
        if(mysqli_num_rows($res)>0){
            $vec = mysqli_fetch_array($res);
        }
        return $vec;
    }
}
