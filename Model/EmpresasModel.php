<?php

class EmpresasModel{
    private $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function getEmpresas(){
        $sql = "SELECT * FROM empresas WHERE 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
}