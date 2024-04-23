<?php
require_once '../Controller/ClienteController.php';
$clienteController = new ClienteController();
$clientes = $clienteController->listarTodos();
header('Content-Type: application/json');
echo json_encode($clientes);



