<?php
require_once '../Controller/ModeloController.php';

if (isset($_POST['modelo_id'])) {
    $modelo_id = $_POST['modelo_id'];
    $modeloController = new ModeloController();
    $modelo = $modeloController->listarModeloID($modelo_id);
    if ($modelo) {
        $modelo_json = json_encode($modelo);
        header('Content-Type: application/json');
        echo $modelo_json;
    } else {
        $mensagem = ["error" => "Marca não encontrada para o ID $modelo_id"];
        echo json_encode($mensagem);
    }
} else {
    $mensagem = ["error" => "Parâmetro 'marca_id' não foi fornecido via POST"];
    echo json_encode($mensagem);
}
