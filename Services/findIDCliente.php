<?php
require_once '../Controller/ClienteController.php';

if (isset($_POST['cliente_id'])) {
    $cliente_id = $_POST['cliente_id'];
    $clienteController = new ClienteController();
    $cliente = $clienteController->listarClienteID($cliente_id);

    if ($cliente) {
        $cliente_json = json_encode($cliente);
        header('Content-Type: application/json');
        echo $cliente_json;
    } else {
        $mensagem = ["error" => "Cliente não encontrado para o ID $cliente_id"];
        echo json_encode($mensagem);
    }
} else {
    $mensagem = ["error" => "Parâmetro 'cliente_id' não foi fornecido via POST"];
    echo json_encode($mensagem);
}
