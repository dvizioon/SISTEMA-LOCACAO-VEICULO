<?php
require_once '../Conf/Connection.php';
require_once '../Controller/ModeloController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $modeloController = new ModeloController();


    $dadosAtualizados = [
        'id' => $_POST['id_modelo'],
        'nome' => $_POST['nome_modelo_m'],
        'marca_id' => $_POST['marcar_id_m'],
        'descricao' => $_POST['descricao_modelo_m'],
    ];

    $resultado = $modeloController->atualizarModelo($dadosAtualizados);
    var_dump($resultado);

    if ($resultado) {
        echo json_encode(['success' => true, 'message' => 'Modelo atualizado com sucesso!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar Modelo.']);
    }
} else {
    // Se a requisição não for POST, retorna status HTTP 405 (Método não permitido)
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
}
