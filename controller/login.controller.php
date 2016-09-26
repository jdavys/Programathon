<?php
require_once 'model/Login.model.php';

class LoginController{
    
    private $model;
    private $pmodel;
    private $cmodel;
    
    public function __CONSTRUCT(){
        $this->model  = new LoginModel();
        
    }
     public function Index(){
        require_once 'view/header.php';
        require_once 'view/Login/index.php';
        require_once 'view/footer.php';
    }
}