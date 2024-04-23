<?php
require_once '../Conf/Connection.php';

class LocacaoController
{
    private $db;

    public function __construct()
    {
        $this->db = Conn::getConn();
    }

    public function listarTodasLocacoes()
    {
        $query = "SELECT * FROM locacao";
        $result = $this->db->query($query);
        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function listarLocacaoPorId($locacao_id)
    {
        try {
            $query = "SELECT * FROM locacao WHERE id = :locacao_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":locacao_id", $locacao_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao listar locação por ID: " . $e->getMessage());
        }
    }

    public function criarLocacao($dados)
    {
        $cliente_id = $dados['cliente_id'];
        $automovel_id = $dados['automovel_id'];
        $protocolo_aluguel = $dados['protocolo_aluguel'];
        $data_hora_locacao = $dados['data_hora_locacao'];
        $data_hora_devolucao = $dados['data_hora_devolucao'];
        $protocol_resolvido = $dados['protocol_resolvido']; 

        $query = "INSERT INTO locacao (cliente_id, automovel_id, protocolo_aluguel, data_hora_locacao, data_hora_devolucao,protocol_resolvido) 
              VALUES (:cliente_id, :automovel_id, :protocolo_aluguel, :data_hora_locacao, :data_hora_devolucao, :protocol_resolvido)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
        $stmt->bindParam(':automovel_id', $automovel_id, PDO::PARAM_INT);
        $stmt->bindParam(':protocolo_aluguel', $protocolo_aluguel);
        $stmt->bindParam(':data_hora_locacao', $data_hora_locacao);
        $stmt->bindParam(':data_hora_devolucao', $data_hora_devolucao);
        $stmt->bindParam(':protocol_resolvido', $protocol_resolvido);

        if ($stmt->execute()) {
            
            $lastInsertedId = $this->db->lastInsertId();
            return $this->listarLocacaoPorId($lastInsertedId); 
        } else {
            return false;
        }
    }


    public function atualizarLocacao($dados)
    {
        $id = $dados['id'];
        $cliente_id = $dados['cliente_id'];
        $automovel_id = $dados['automovel_id'];
        $protocolo_aluguel = $dados['protocolo_aluguel']; 
        $data_hora_locacao = $dados['data_hora_locacao'];
        $data_hora_devolucao = $dados['data_hora_devolucao'];
        $protocol_resolvido = $dados['protocol_resolvido']; 

        $query = "UPDATE locacao
              SET cliente_id = :cliente_id, 
                  automovel_id = :automovel_id,
                  protocolo_aluguel = :protocolo_aluguel,  
                  data_hora_locacao = :data_hora_locacao,
                  data_hora_devolucao = :data_hora_devolucao,
                  protocol_resolvido = :protocol_resolvido
              WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
        $stmt->bindParam(':automovel_id', $automovel_id, PDO::PARAM_INT);
        $stmt->bindParam(':protocolo_aluguel', $protocolo_aluguel); 
        $stmt->bindParam(':data_hora_locacao', $data_hora_locacao);
        $stmt->bindParam(':data_hora_devolucao', $data_hora_devolucao);
        $stmt->bindParam(':protocol_resolvido', $protocol_resolvido);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizarProtocoloResolvido($id, $novoValor)
    {
        $query = "UPDATE locacao
                  SET protocol_resolvido = :novo_valor
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':novo_valor', $novoValor);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function deletarLocacao($locacaoId)
    {
        $query = "DELETE FROM locacao WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $locacaoId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
