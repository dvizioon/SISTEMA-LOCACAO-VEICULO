<?php
require_once '../Conf/Connection.php';
require_once '../Controller/MarcaController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $marcaController = new MarcaController();


    $dadosAtualizados = [
        'id' => $_POST['id_marca'],
        'nome' => $_POST['nome_marca_m'],
    ];

    echo "Ola";

    $resultado = $marcaController->atualizarMarca($dadosAtualizados);
    var_dump($resultado);

    if ($resultado) {
        echo json_encode(['success' => true, 'message' => 'Marca atualizado com sucesso!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar Marca.']);
    }
} else {

    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
}
