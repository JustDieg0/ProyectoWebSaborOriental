<?php
class DetallePedido{
    private $producto;
    private $cantidad;

    public function __construct($producto,$cantidad) {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function getProducto() {
        return $this->producto;
    }
    public function setProducto($producto) {
        $this->producto = $producto;
    }
}