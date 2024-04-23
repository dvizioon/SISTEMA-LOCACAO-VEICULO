<?php
require_once '../Controller/AutomovelController.php';

$automovelController = new AutomovelController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se todos os campos esperados estão presentes e não são vazios
    $dadosAutomovel = array(
        'placa' => isset($_POST['placa']) ? $_POST['placa'] : null,
        'img' => isset($_POST['img']) ? $_POST['img'] : null,
        'nome' => isset($_POST['nome']) ? $_POST['nome'] : null,
        'cor' => isset($_POST['cor']) ? $_POST['cor'] : null,
        'quilometragem' => isset($_POST['quilometragem']) ? $_POST['quilometragem'] : null,
        'ano' => isset($_POST['ano']) ? $_POST['ano'] : null,
        'quantidade_portas' => isset($_POST['portas']) ? $_POST['portas'] : null,
        'tipoCombustivel' => isset($_POST['combustivel']) ? $_POST['combustivel'] : null,
        'renavam' => isset($_POST['renavam']) ? $_POST['renavam'] : null,
        'chassi' => isset($_POST['chassi']) ? $_POST['chassi'] : null,
        'locacao' => isset($_POST['locacao']) ? $_POST['locacao'] : null,
        'condicao' => isset($_POST['condicao']) ? $_POST['condicao'] : "Habilitado",
        'protocolo_aluguel' => isset($_POST['protocolo_aluguel']) ? $_POST['protocolo_aluguel'] : "",
        'modelo_id' => isset($_POST['modelo_id']) ? $_POST['modelo_id'] : null,
        'marca_id' => isset($_POST['marca_id']) ? $_POST['marca_id'] : null
    );

    var_dump($dadosAutomovel);

    // Verifica se todos os campos obrigatórios foram preenchidos  empty($dadosAutomovel['protocolo_aluguel'])
    if (empty($dadosAutomovel['placa']) || empty($dadosAutomovel['nome']) || empty($dadosAutomovel['cor']) || empty($dadosAutomovel['quilometragem']) || empty($dadosAutomovel['ano']) || empty($dadosAutomovel['quantidade_portas']) || empty($dadosAutomovel['tipoCombustivel']) || empty($dadosAutomovel['renavam']) || empty($dadosAutomovel['chassi']) || empty($dadosAutomovel['locacao']) || empty($dadosAutomovel['condicao'])  ||empty($dadosAutomovel['modelo_id']) || empty($dadosAutomovel['marca_id'])) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Chamar o método criarAutomovel() para criar o novo automóvel
        if ($automovelController->criarAutomovel($dadosAutomovel)) {
            echo "Novo automóvel criado com sucesso!";
        } else {
            echo "Erro ao criar novo automóvel.";
        }
    }
} else {
    // Redirecionar para página de erro se não for uma requisição POST válida
    header("Location: erro.php");
    exit;
}
