<?php

require_once '../Controller/MarcaController.php';
$marcaController = new MarcaController();
$marca = $marcaController->listarTodos();
header('Content-Type: application/json');
echo json_encode($marca);
