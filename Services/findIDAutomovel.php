<?php
require_once '../Controller/AutomovelController.php';

if (isset($_POST['automovel_id'])) {
    $automovel_id = $_POST['automovel_id'];
    $automovelController = new AutomovelController();
    $automovel = $automovelController->listarAutoID($automovel_id);

    if ($automovel) {
        $automovel_json = json_encode($automovel);
        header('Content-Type: application/json');
        echo $automovel_json;
    } else {
        $mensagem = ["error" => "Automóvel não encontrado para o ID $automovel_id"];
        echo json_encode($mensagem);
    }
} else {
    $mensagem = ["error" => "Parâmetro 'automovel_id' não foi fornecido via POST"];
    echo json_encode($mensagem);
}
