<?
class Cliente {
    private $id;
    private $nombre;
    private $correo;
    private $contra;
    private $telefono;
    private $dni;

    public function __construct(){
        $this->id = 0;
        $this->nombre = "";
        $this->correo = "";
        $this->contra = "";
        $this->telefono = "";
        $this->dni = "";
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function getContra(){
        return $this->contra;
    }

    public function setContra($contra){
        $this->contra = $contra;
    }
}