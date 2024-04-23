<?php
require_once '../Conf/Connection.php';

class ModeloController
{
    private $db;

    public function __construct()
    {
        $this->db = Conn::getConn();
    }

    public function listarTodos()
    {
        $query = "SELECT * FROM modelo";
        $result = $this->db->query($query);
        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    public function listarModeloID($modelo_id)
    {
        try {
            $query = "SELECT * FROM modelo WHERE id = :modelo_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":modelo_id", $modelo_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao listar modelo por ID: " . $e->getMessage());
        }
    }

    public function criarModelo($dados)
    {
        $nome = $dados['nome'];
        $marca_id = $dados['marca_id'];
        $descricao = $dados['descricao'];


        $query = "INSERT INTO modelo (nome, marca_id, descricao) 
                  VALUES (:nome, :marca_id, :descricao)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':marca_id', $marca_id);
        $stmt->bindParam(':descricao', $descricao);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletarModelo($modeloId)
    {
        $query = "DELETE FROM modelo WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $modeloId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function atualizarModelo($dados)
    {
        $id = $dados['id'];
        $nome = $dados['nome'];
        $marca_id = $dados['marca_id'];
        $descricao = $dados['descricao'];


        $query = "UPDATE modelo
                  SET nome = :nome, 
                      marca_id = :marca_id,
                      descricao = :descricao
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);


        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':marca_id', $marca_id);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
