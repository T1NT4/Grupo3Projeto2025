<?php
require_once __DIR__.'/../Model/ResiduoModel.php';

class ResiduoController{
    private $ResiduoModel;

    function __construct($pdo){
        $this->ResiduoModel = new ResiduoModel($pdo);
    }
    function registerResiduo($tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req){
        return $this->ResiduoModel->registerResiduo($tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req);
    }
   

}