<?php
require_once '../Conf/Connection.php';

class ProtocoloController
{
    private $db;

    public function __construct()
    {
        $this->db = Conn::getConn();
    }

    public function inserirProtocolo($id_carro, $id_cliente, $locacao_id, $protocolo_aluguel, $resolvido)
    {
        $query = "INSERT INTO protocolo (id_carro, id_cliente, locacao_id, protocolo_aluguel, resolvido) 
                  VALUES (:id_carro, :id_cliente, :locacao_id, :protocolo_aluguel, :resolvido)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id_carro', $id_carro, PDO::PARAM_STR);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':locacao_id', $locacao_id, PDO::PARAM_INT);
        $stmt->bindParam(':protocolo_aluguel', $protocolo_aluguel, PDO::PARAM_STR);
        $stmt->bindParam(':resolvido', $resolvido, PDO::PARAM_STR); 

        if ($stmt->execute()) {
            return true;  
        } else {
            return false; 
        }
    }

    public function atualizarProtocolo($id, $id_carro, $id_cliente, $locacao_id, $protocolo_aluguel, $resolvido)
    {
        $query = "UPDATE protocolo
                  SET id_carro = :id_carro,
                      id_cliente = :id_cliente,
                      locacao_id = :locacao_id,
                      protocolo_aluguel = :protocolo_aluguel,
                      resolvido = :resolvido
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':id_carro', $id_carro, PDO::PARAM_STR);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':locacao_id', $locacao_id, PDO::PARAM_INT);
        $stmt->bindParam(':protocolo_aluguel', $protocolo_aluguel, PDO::PARAM_STR);
        $stmt->bindParam(':resolvido', $resolvido, PDO::PARAM_STR); 

        if ($stmt->execute()) {
            return true;  
        } else {
            return false; 
        }
    }
    public function listarTodosProtocolos()
    {
        $query = "SELECT * FROM protocolo";
        $result = $this->db->query($query);
        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function listarProtocoloPorId($id)
    {
        try {
            $query = "SELECT * FROM protocolo WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("Erro ao listar protocolo por ID: " . $e->getMessage());
        }
    }

    public function resolverProtocolo($id, $resolvido)
    {
        try {
            $query = "UPDATE protocolo SET resolvido = :resolvido WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':resolvido', $resolvido, PDO::PARAM_STR); 
            if ($stmt->execute()) {
                return true;
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            die("Erro ao resolver protocolo: " . $e->getMessage());
        }
    }

    public function deletarProtocolo($id)
    {
        $query = "DELETE FROM protocolo WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;  
        } else {
            return false; 
        }
    }
}
