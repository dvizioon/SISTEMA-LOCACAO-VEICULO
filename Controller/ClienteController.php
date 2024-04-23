<?php
require_once '../Conf/Connection.php';

class ClienteController
{
    private $db;

    public function __construct()
    {
        $this->db = Conn::getConn();
    }

    public function listarTodos()
    {
        $query = "SELECT * FROM cliente";
        $result = $this->db->query($query);
        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function listarClienteID($cliente_id)
    {
        try {
            $query = "SELECT * FROM cliente WHERE id = :cliente_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":cliente_id", $cliente_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao listar cliente por ID: " . $e->getMessage());
        }
    }

    public function criarCliente($dados)
    {
        $nome = $dados['nome'];
        $cpf = $dados['cpf'];
        $rg = $dados['rg'];
        $numero = $dados['numero'];
        $email = $dados['email'];
        $pai = $dados['pai'];
        $mae = $dados['mae'];
        $antecedents = $dados['antecedents'] ?? null;

        $query = "INSERT INTO cliente (nome, cpf, rg, numero, email, pai, mae, antecedents) 
                  VALUES (:nome, :cpf, :rg, :numero, :email, :pai, :mae, :antecedents)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pai', $pai);
        $stmt->bindParam(':mae', $mae);
        $stmt->bindParam(':antecedents', $antecedents);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletarCliente($clienteId)
    {
        $query = "DELETE FROM cliente WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $clienteId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function atualizarCliente($dados)
    {
        $id = $dados['id'];
        $nome = $dados['nome'];
        $cpf = $dados['cpf'];
        $rg = $dados['rg'];
        $numero = $dados['numero'];
        $email = $dados['email'];
        $pai = $dados['pai'];
        $mae = $dados['mae'];
        $antecedents = $dados['antecedents'] ?? null;

        $query = "UPDATE cliente
                  SET nome = :nome, 
                      cpf = :cpf,
                      rg = :rg,
                      numero = :numero,
                      email = :email,
                      pai = :pai,
                      mae = :mae,
                      antecedents = :antecedents
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pai', $pai);
        $stmt->bindParam(':mae', $mae);
        $stmt->bindParam(':antecedents', $antecedents);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
