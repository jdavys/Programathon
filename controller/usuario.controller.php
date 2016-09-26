<?php
require_once 'model/usuario.model.php';

class LoginController{
    
    private $model;
    private $pmodel;
    private $cmodel;
    
    public function __CONSTRUCT(){
        $this->model  = new usuario();
        
    }
     public function Index(){

    }
}