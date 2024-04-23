<?php
require_once '../Controller/ClienteController.php';
require_once '../Controller/AutomovelController.php';
require_once '../Controller/LocacaoController.php';

$clienteController = new ClienteController();
$automovelController = new AutomovelController();
$locacaoController = new LocacaoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dadosFind = array(
        'id_client' => isset($_POST['cliente_id']) ? $_POST['cliente_id'] : null,
        'id_automovel' => isset($_POST['automovel_id']) ? $_POST['automovel_id'] : null,
        'id_locacao' => isset($_POST['protocolo_aluguel']) ? $_POST['protocolo_aluguel'] : null,
    );

    if (empty($dadosFind['id_client']) || empty($dadosFind['id_automovel']) || empty($dadosFind['id_locacao'])) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        $cliente = $clienteController->listarClienteID($dadosFind['id_client']);
        $automovel = $automovelController->listarAutoID($dadosFind['id_automovel']);
        $locacao = $locacaoController->listarLocacaoPorId($dadosFind['id_locacao']);


        $resultados = array(
            'cliente' => $cliente,
            'automovel' => $automovel,
            'locacao' => $locacao
        );


        header('Content-Type: application/json');
        echo json_encode($resultados);
    }
} else {
    header("Location: erro.php");
    exit;
}
