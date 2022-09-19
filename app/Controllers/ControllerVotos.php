<?php

require_once('app/Database/ConexaoDB.php');

class ControllerVotos
{
    public function createVotos(Votos $votos){
        try{
            $insertVotos = "INSERT INTO votos (nome, cpf, idade, id_candidato) VALUES (:nome, :cpf, :idade, :id_candidato)";
            $stmt = ConexaoDB::getConn()->prepare($insertVotos);
            $stmt->bindValue(':nome', $votos->getNome());
            $stmt->bindValue(':cpf', $votos->getCpf());
            $stmt->bindValue(':idade', $votos->getIdade());
            $stmt->bindValue(':id_candidato', $votos->getCandidato());
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readVotos(){
        try{
            $queryVotos = "SELECT votos.nome, votos.cpf, votos.idade, candidatos.nome as candidato_nome, votos.data_registro,
            (SELECT count(*) FROM votos WHERE id_candidato = 1) as total_b,
            (SELECT count(*) FROM votos WHERE id_candidato = 2) as total_m
            FROM votos INNER JOIN candidatos ON votos.id_candidato = candidatos.id;";
            $stmt = ConexaoDB::getConn()->prepare($queryVotos);
            $stmt->execute();

            if($stmt->rowCount()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateVotos(Votos $votos){

    }

    public function deleteVotos(int $id){

    }
}

?>