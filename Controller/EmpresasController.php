<?php
require_once __DIR__.'/../model/EmpresasModel.php';

class EmpresasController{
    private $EmpresasModel;

    function __construct($pdo){
        $this->EmpresasModel = new EmpresasModel($pdo);
    }
    function getEmpresas(){
        return $this->EmpresasModel->getEmpresas();
    }
}