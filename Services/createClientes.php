<?php
require_once '../Controller/ClienteController.php';

$clienteController = new ClienteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dadosCliente = array(
        'nome' => isset($_POST['nome']) ? $_POST['nome'] : null,
        'cpf' => isset($_POST['cpf']) ? $_POST['cpf'] : null,
        'rg' => isset($_POST['rg']) ? $_POST['rg'] : null,
        'numero' => isset($_POST['numero']) ? $_POST['numero'] : null,
        'email' => isset($_POST['email']) ? $_POST['email'] : null,
        'pai' => isset($_POST['pai']) ? $_POST['pai'] : null,
        'mae' => isset($_POST['mae']) ? $_POST['mae'] : null,
        'antecedents' => isset($_POST['antecedents']) ? $_POST['antecedents'] : null
    );


    if (empty($dadosCliente['nome']) || empty($dadosCliente['cpf']) || empty($dadosCliente['rg']) || empty($dadosCliente['numero']) || empty($dadosCliente['email']) || empty($dadosCliente['pai']) || empty($dadosCliente['mae'])) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        if ($clienteController->criarCliente($dadosCliente)) {
            echo "Novo Cliente criado com sucesso!";
        } else {
            echo "Erro ao criar novo Cliente.";
        }
    }
} else {
    header("Location: erro.php");
    exit;
}
