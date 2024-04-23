<?php

require_once '../Controller/ModeloController.php';
$modeloController = new ModeloController();
$modelos = $modeloController->listarTodos();
header('Content-Type: application/json');
echo json_encode($modelos);
