<?php
require_once '../Controller/MarcaController.php';

if (isset($_POST['marca_id'])) {
    $marca_id = $_POST['marca_id'];
    $marcaController = new MarcaController;
    $marca = $marcaController->listarMarcaID($marca_id);
    if ($marca) {
        $marca_json = json_encode($marca);
        header('Content-Type: application/json');
        echo $marca_json;
    } else {
        $mensagem = ["error" => "Marca não encontrada para o ID $marca_id"];
        echo json_encode($mensagem);
    }
} else {
    $mensagem = ["error" => "Parâmetro 'marca_id' não foi fornecido via POST"];
    echo json_encode($mensagem);
}
