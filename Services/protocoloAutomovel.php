<?php

require_once '../Controller/AutomovelController.php';
if (isset($_POST['automovel_id']) && isset($_POST['novo_protocolo'])) {
    $automovel_id = $_POST['automovel_id'];
    $novo_protocolo = $_POST['novo_protocolo'];
    $automovelController = new AutomovelController();
    if ($automovelController->atualizarProtocolo($automovel_id, $novo_protocolo)) {
        $mensagem = ["success" => "Protocolo de aluguel atualizado com sucesso para o automóvel com ID $automovel_id"];
        echo json_encode($mensagem);
    } else {
        $mensagem = ["error" => "Falha ao atualizar o protocolo de aluguel para o automóvel com ID $automovel_id"];
        echo json_encode($mensagem);
    }
} else {
    $mensagem = ["error" => "Parâmetros 'automovel_id' e 'novo_protocolo' não foram fornecidos via POST"];
    echo json_encode($mensagem);
}
