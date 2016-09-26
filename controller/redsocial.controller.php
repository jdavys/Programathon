<?php
require_once 'model/redsocial.model.php';

class LoginController{
    
    private $model;
    private $pmodel;
    private $cmodel;
    
    public function __CONSTRUCT(){
        $this->model  = new redsocial();
        
    }
     public function Index(){
  
    }
}