<?php
require_once '../Controller/LocacaoController.php';

$locacaoController = new LocacaoController();
$locacoes = $locacaoController->listarTodasLocacoes();

header('Content-Type: application/json');
echo json_encode($locacoes);
