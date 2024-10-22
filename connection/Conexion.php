<?php
class Conexion{
    private $cn=null;
    function  conecta(){
      if($this->cn==null){
       $this->cn= mysqli_connect ("b5ettxukkk26zhxgc45i-mysql.services.clever-cloud.com", "utpub8zbifbtjwur","jSLyzd2F0pzrYFcZEwAO","b5ettxukkk26zhxgc45i"); 
      }
       return $this->cn;      
    }
   function desconecta(){
    if($this->cn !=null)
        mysqli_close ($this->cn);  
       
   }
}