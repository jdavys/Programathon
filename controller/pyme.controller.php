<?php
require_once 'model/pyme.model.php';

class PymeController{
    
    private $model;

    
    public function __CONSTRUCT(){
        $this->model  = new myPymeModel();
        
    }
    
    public function Index(){
        require_once 'view/Registro/index.php';
    }
    
    public function Crud(){
        require_once 'view/Registro/index.php';
    }
    
    public function Ver(){
        
        $miPyme = $this->model->Obtener($_REQUEST['id']);
        
        require_once 'view/header.php';
        require_once 'view/miPyme/ver.php';
        require_once 'view/footer.php';
    }
    
	public function Guardar()
	{
	    print_r(json_encode($this->model->Registrar( $_POST )));
	}
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
    }
    
    public function ClienteBuscar()
    {
        print_r(json_encode(
            $this->cmodel->Buscar($_REQUEST['criterio'])
        ));
    }
    
    public function ProductoBuscar()
    {
        print_r(json_encode(
            $this->pmodel->Buscar($_REQUEST['criterio'])
        ));
    }
    
    public function Listar()
    {
        print_r($this->model->Listar());  
    }
}