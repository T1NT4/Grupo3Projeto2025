<?php

class ResiduoModel{
    private $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
    }
    function registerResiduo($user_id, $tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req){
        
        $sql = "INSERT INTO residuos (user_id, tipo_residuo, peso, empresa_id, endereco_residuo, data_req)
                VALUES (? , ?, ?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ $user_id, $tipo_residuo, $peso, $empresa_responsavel, $endereco_residuo, $data_req]);
    }
    
    function getResiduosPorMes($user_id,$dataAtual){
        try {
            // Query para buscar registros do mesmo mês e ano atual
            $sql = "SELECT 
                        t1.user_id,
                        t1.tipo_residuo,
                        t1.peso,
                        t2.nome_empresa,
                        t2.endereco_de_entrega,
                        t1.endereco_residuo,
                        t1.data_req
                    FROM 
                        residuos t1
                    JOIN 
                        empresas t2 ON t1.empresa_id = t2.empresa_id 
                    WHERE data_req LIKE ? AND
                    user_id = ? 
                    ORDER BY data_req DESC";
        
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$dataAtual, $user_id]); // Passando diretamente no execute()
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $e) {
            return null;
        }
    }
}