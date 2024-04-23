<?php
require_once '../Conf/Connection.php';

class AutomovelController
{
    private $db;

    public function __construct()
    {
        $this->db = Conn::getConn();
    }

    public function listarTodos()
    {
        $query = "SELECT * FROM automovel";
        $result = $this->db->query($query);
        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function listarAutoID($id)
    {
        try {
            $query = "SELECT * FROM automovel WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("Erro ao listar automóvel por ID: " . $e->getMessage());
        }
    }


    public function criarAutomovel($dados)
    {
        $placa = $dados['placa'];
        $img = $dados['img'];
        $nome = $dados['nome'];
        $cor = $dados['cor'];
        $quilometragem = $dados['quilometragem'];
        $ano = $dados['ano'];
        $quantidade_portas = $dados['quantidade_portas'];
        $tipoCombustivel = $dados['tipoCombustivel'];
        $renavam = $dados['renavam'];
        $chassi = $dados['chassi'];
        $locacao = $dados['locacao'];
        $modelo_id = $dados['modelo_id'];
        $marca_id = $dados['marca_id'];
        $condicao = $dados['condicao'];
        $protocolo_aluguel = $dados['protocolo_aluguel'];

        $query = "INSERT INTO automovel (placa, img, nome, cor, quilometragem, ano, quantidade_portas, tipoCombustivel, RENAVAM, chassi, locacao, condicao, protocolo_aluguel, modelo_id, marca_id) 
              VALUES (:placa, :img, :nome, :cor, :quilometragem, :ano, :quantidade_portas, :tipoCombustivel, :renavam, :chassi, :locacao, :condicao, :protocolo_aluguel, :modelo_id, :marca_id)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':placa', $placa);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':quilometragem', $quilometragem);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':quantidade_portas', $quantidade_portas);
        $stmt->bindParam(':tipoCombustivel', $tipoCombustivel);
        $stmt->bindParam(':renavam', $renavam);
        $stmt->bindParam(':chassi', $chassi);
        $stmt->bindParam(':locacao', $locacao);
        $stmt->bindParam(':modelo_id', $modelo_id);
        $stmt->bindParam(':marca_id', $marca_id);
        $stmt->bindParam(':condicao', $condicao);
        $stmt->bindParam(':protocolo_aluguel', $protocolo_aluguel);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizarProtocolo($automovelId, $novoProtocolo)
    {
        try {
            if (!$this->existeAutomovel($automovelId)) {
                return false; 
            }

            $query = "UPDATE automovel SET protocolo_aluguel = :protocolo WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':protocolo', $novoProtocolo);
            $stmt->bindParam(':id', $automovelId, PDO::PARAM_INT);

            return $stmt->execute(); 
        } catch (PDOException $e) {
            die("Erro ao atualizar protocolo de aluguel: " . $e->getMessage());
        }
    }

    private function existeAutomovel($automovelId)
    {
        $query = "SELECT COUNT(*) FROM automovel WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $automovelId, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        return $count > 0; 
    }

    public function deletarAutomovel($automovelId)
    {
        $query = "DELETE FROM automovel WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $automovelId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function atualizarAutomovel($dados)
    {
        $id = $dados['id'];
        $placa = $dados['placa'];
        $img = $dados['img'];
        $nome = $dados['nome'];
        $cor = $dados['cor'];
        $quilometragem = $dados['quilometragem'];
        $ano = $dados['ano'];
        $quantidade_portas = $dados['quantidade_portas'];
        $tipoCombustivel = $dados['tipoCombustivel'];
        $renavam = $dados['renavam'];
        $chassi = $dados['chassi'];
        $locacao = $dados['locacao'];
        $condicao = $dados['condicao'];
        $protocolo_aluguel = $dados['protocolo_aluguel'];
        $modelo_id = $dados['modelo_id'];
        $marca_id = $dados['marca_id'];

        $query = "UPDATE automovel 
                  SET placa = :placa, 
                      img = :img, 
                      nome = :nome, 
                      cor = :cor, 
                      quilometragem = :quilometragem, 
                      ano = :ano, 
                      quantidade_portas = :quantidade_portas, 
                      tipoCombustivel = :tipoCombustivel, 
                      RENAVAM = :renavam, 
                      chassi = :chassi, 
                      locacao = :locacao, 
                      condicao = :condicao,
                      protocolo_aluguel = :protocolo_aluguel,
                      modelo_id = :modelo_id, 
                      marca_id = :marca_id
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':placa', $placa);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':quilometragem', $quilometragem);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':quantidade_portas', $quantidade_portas);
        $stmt->bindParam(':tipoCombustivel', $tipoCombustivel);
        $stmt->bindParam(':renavam', $renavam);
        $stmt->bindParam(':chassi', $chassi);
        $stmt->bindParam(':locacao', $locacao);
        $stmt->bindParam(':condicao', $condicao);
        $stmt->bindParam(':protocolo_aluguel', $protocolo_aluguel);
        $stmt->bindParam(':modelo_id', $modelo_id);
        $stmt->bindParam(':marca_id', $marca_id);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
