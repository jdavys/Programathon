<?php
require_once 'model/gestor.model.php';

class GestorController{
    
    private $model;
    private $pmodel;
    private $cmodel;
    
    public function __CONSTRUCT(){
        $this->model  = new GestorModel();
        
    }
     public function Index(){
        require_once 'view/header.php';
        require_once 'view/gestor/index.php';
        require_once 'view/footer.php';
    }
}