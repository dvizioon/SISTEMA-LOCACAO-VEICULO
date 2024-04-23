<?php
require_once '../Conf/Connection.php';
require_once '../Controller/AutomovelController.php';

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Instancia o controlador de automóveis
    $automovelController = new AutomovelController();

    // Obtém os dados atualizados do POST
    $dadosAtualizados = [
        'id' => $_POST['id_m'],
        'placa' => $_POST['placa_m'],
        'img' => $_POST['img_m'],
        'nome' => $_POST['nome_m'],
        'cor' => $_POST['cor_m'],
        'quilometragem' => $_POST['quilometragem_m'],
        'ano' => $_POST['ano_m'],
        'quantidade_portas' => $_POST['quantidade_portas_m'],
        'tipoCombustivel' => $_POST['tipoCombustivel_m'],
        'renavam' => $_POST['renavam_m'],
        'chassi' => $_POST['chassi_m'],
        'locacao' => $_POST['locacao_m'],
        'condicao' => isset($_POST['condicao_m']) ? $_POST['condicao_m'] : "Habilitado",
        'protocolo_aluguel' => isset($_POST['protocolo_aluguel_m']) ? $_POST['protocolo_aluguel_m'] : "",
        'modelo_id' => $_POST['modelo_id_m'],
        'marca_id' => $_POST['marca_id_m']
    ];

    // Chama o método para atualizar o automóvel
    $resultado = $automovelController->atualizarAutomovel($dadosAtualizados);

    // Verifica o resultado da atualização e retorna uma resposta JSON
    if ($resultado) {
        echo json_encode(['success' => true, 'message' => 'Automóvel atualizado com sucesso!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar automóvel.']);
    }
} else {
    // Se a requisição não for POST, retorna status HTTP 405 (Método não permitido)
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
}
