<?php

require_once '../Controller/AutomovelController.php';
$automovelController = new AutomovelController();
$automoveis = $automovelController->listarTodos();
header('Content-Type: application/json');
echo json_encode($automoveis);
