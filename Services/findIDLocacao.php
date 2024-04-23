<?php
require_once '../Controller/LocacaoController.php';

if (isset($_POST['locacao_id'])) {
    $locacao_id = $_POST['locacao_id'];
    $locacaoController = new LocacaoController();
    $locacao = $locacaoController->listarLocacaoPorId($locacao_id);
    if ($locacao) {
        $locacao_json = json_encode($locacao);
        header('Content-Type: application/json');
        echo $locacao_json;
    } else {
        $mensagem = ["error" => "Locação não encontrada para o ID $locacao_id"];
        echo json_encode($mensagem);
    }
} else {
    $mensagem = ["error" => "Parâmetro 'locacao_id' não foi fornecido via POST"];
    echo json_encode($mensagem);
}
