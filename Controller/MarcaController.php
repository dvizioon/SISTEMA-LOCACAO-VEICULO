<?php
require_once '../Conf/Connection.php';

class MarcaController
{
    private $db;

    public function __construct()
    {
        $this->db = Conn::getConn();
    }

    public function listarTodos()
    {
        $query = "SELECT * FROM marca";
        $result = $this->db->query($query);
        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function criarMarca($dados)
    {
        $nome = $dados['nome'];

        $query = "INSERT INTO marca (nome) 
                  VALUES (:nome)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nome', $nome);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletarMarca($marcaId)
    {
        $query = "DELETE FROM marca WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $marcaId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function listarMarcaID($marca_id)
    {
        try {
            $query = "SELECT * FROM marca WHERE id = :marca_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":marca_id", $marca_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao listar marca por ID: " . $e->getMessage());
        }
    }

    public function atualizarMarca($dados)
    {
        $id = $dados['id'];
        $nome = $dados['nome'];


        $query = "UPDATE marca
                  SET nome = :nome
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);


        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
