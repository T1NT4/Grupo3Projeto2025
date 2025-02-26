<?php
require_once __DIR__.'/../Model/ResiduoModel.php';

class ResiduoController{
    private $ResiduoModel;

    function __construct($pdo){
        $this->ResiduoModel = new ResiduoModel($pdo);
    }
    function registerResiduo($user_id, $tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req){
        return $this->ResiduoModel->registerResiduo($user_id, $tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req);
    }
   
    function getResiduosPorMes($user_id,$dataAtual){
        return $this->ResiduoModel->getResiduosPorMes($user_id,$dataAtual);
    }
}