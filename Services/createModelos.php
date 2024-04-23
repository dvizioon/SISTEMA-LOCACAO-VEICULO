<?php
require_once '../Controller/ModeloController.php';

$modeloController = new ModeloController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dadosmodelos = array(
        'nome' => isset($_POST['nome']) ? $_POST['nome'] : null,
        'marca_id' => isset($_POST['marca_id']) ? $_POST['marca_id'] : null,
        'descricao' => isset($_POST['descricao']) ? $_POST['descricao'] : null,
    );

    // var_dump($dadosmodelos);

    if (empty($dadosmodelos['nome']) || empty($dadosmodelos['marca_id']) || empty($dadosmodelos['descricao']) ) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {

        if ($modeloController->criarModelo($dadosmodelos)) {
            echo "Novo Modelo criado com sucesso!";
        } else {
            echo "Erro ao criar novo Modelo.";
        }
    }
} else {
    header("Location: erro.php");
    exit;
}
