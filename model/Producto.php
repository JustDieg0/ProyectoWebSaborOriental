<?
class Producto{
    private $id;
    private $descripcion;
    private $precio;
    private $categoria;

    public function __construct(){
        $this->id = 0;
        $this->descripcion = "";
        $this->precio = 0.0;
        $this->categoria = "";
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
}