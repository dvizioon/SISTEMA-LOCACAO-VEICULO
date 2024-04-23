<?php
require_once '../Controller/LocacaoController.php';

$locacaoController = new LocacaoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dadosLocacao = [
        'cliente_id' => isset($_POST['cliente_id']) ? $_POST['cliente_id'] : null,
        'automovel_id' => isset($_POST['automovel_id']) ? $_POST['automovel_id'] : null,
        'protocolo_aluguel' => isset($_POST['protocolo_aluguel']) ? $_POST['protocolo_aluguel'] : null,
        'data_hora_locacao' => isset($_POST['data_hora_locacao']) ? $_POST['data_hora_locacao'] : null,
        'data_hora_devolucao' => isset($_POST['data_hora_devolucao']) ? $_POST['data_hora_devolucao'] : null,
        'protocol_resolvido' => isset($_POST['protocol_resolvido']) ? $_POST['protocol_resolvido'] : 'nao'
    ];
    
    // var_dump($dadosLocacao);
    if (empty($dadosLocacao['cliente_id']) || empty($dadosLocacao['automovel_id']) || empty($dadosLocacao['protocolo_aluguel']) || empty($dadosLocacao['data_hora_locacao']) || empty($dadosLocacao['data_hora_devolucao']) || empty($dadosLocacao['protocol_resolvido'])) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        $novaLocacao = $locacaoController->criarLocacao($dadosLocacao);
        if ($novaLocacao !== false) {
            header('Content-Type: application/json');
            echo json_encode($novaLocacao);
        } else {
            echo "Erro ao criar nova Locação.";
        }
    }
} else {
    header("Location: erro.php");
    exit;
}
