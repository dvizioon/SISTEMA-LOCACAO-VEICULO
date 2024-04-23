<?php
require_once '../Controller/ProtocolController.php';
$protocoloController = new ProtocoloController();
$protocolos = $protocoloController->listarTodosProtocolos();
header('Content-Type: application/json');
echo json_encode($protocolos);
