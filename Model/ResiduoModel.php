<?php

class ResiduoModel{
    private $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
    }
    function registerResiduo($tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req){
        $sql = "SELECT * FROM residuos WHERE tipo_residuo = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$tipo_residuo]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($results)){
            $sql = "INSERT INTO residuos($tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req) VALUES (?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req]);
            return true;
        }else{
            return false;
        }
    }
    
}