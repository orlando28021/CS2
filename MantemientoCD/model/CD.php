<?php
require_once '../persistence/Persistence.php';
class CD {
    private $_id;
    private $_titulo;
    private $_interprete;
    private $_anho;
    public function __construct($id="",$titulo="",$interprete="",$anho=""){
        $this->_id = $id;
        $this->_titulo = $titulo;
        $this->_interprete = $interprete;
        $this->_anho = $anho;
    }
    public function getId(){return $this->_id;}
    public function getTitulo(){return $this->_titulo;}
    public function getInterprete(){return $this->_interprete;}
    public function getAnho(){return $this->_anho;}

    public function __toString() {
        return $this->_titulo;
    }

    public function eliminar($id){
        $cd = Persistence::getInstancia();
        $cd->eliminar($id);
    }

    public function insertar() {
        $cd = Persistence::getInstancia();
        $cd->insertar($this->_titulo,$this->_interprete,$this->_anho);
    }

    public function modificar(){
        $cd = Persistence::getInstancia();
        $cd->modificar($this->_titulo, $this->_interprete, $this->_anho, $this->_id);
    }

    public function getAll(){
        $CDArray = array();
        $listaCD = Persistence::getInstancia();
        $arreglo = $listaCD->getAll();
        foreach($arreglo as $cd){
            $id = $cd['id'];
            $titulo = $cd['titel'];
            $interprete = $cd['interpret'];
            $anho = $cd['jahr'];
            $CDArray[] = new CD($id, $titulo, $interprete, $anho);
        }
        return $CDArray;
    }

}