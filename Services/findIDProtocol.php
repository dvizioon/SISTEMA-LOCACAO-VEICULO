<?php
require_once '../Controller/ProtocolController.php';


if (isset($_POST['protocolo_id'])) {
    $protocolo_id = $_POST['protocolo_id'];
    $protocoloController = new ProtocoloController();
    $protocolo = $protocoloController->listarProtocoloPorId($protocolo_id);

    if ($protocolo) {
        $protocolo_json = json_encode($protocolo);
        header('Content-Type: application/json');
        echo $protocolo_json;
    } else {
        $mensagem = ["error" => "Protocolo não encontrado para o ID $protocolo_id"];
        echo json_encode($mensagem);
    }
} else {
    $mensagem = ["error" => "Parâmetro 'protocolo_id' não foi fornecido via POST"];
    echo json_encode($mensagem);
}
