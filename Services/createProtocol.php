<?php
require_once '../Controller/ProtocolController.php'; 

$protocoloController = new ProtocoloController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dadosProtocolo = array(
        'id_carro' => isset($_POST['id_carro']) ? $_POST['id_carro'] : null,
        'id_cliente' => isset($_POST['id_cliente']) ? $_POST['id_cliente'] : null,
        'locacao_id' => isset($_POST['locacao_id']) ? $_POST['locacao_id'] : null,
        'protocolo_aluguel' => isset($_POST['protocolo_aluguel']) ? $_POST['protocolo_aluguel'] : null,
        'resolvido' => isset($_POST['resolvido']) ? $_POST['resolvido'] : null
    
    );
    if (empty($dadosProtocolo['id_carro']) || empty($dadosProtocolo['id_cliente']) || empty($dadosProtocolo['locacao_id']) || empty($dadosProtocolo['protocolo_aluguel']) || empty($dadosProtocolo['resolvido'])) {
        var_dump($dadosProtocolo);
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {

        if ($protocoloController->inserirProtocolo($dadosProtocolo['id_carro'], $dadosProtocolo['id_cliente'], $dadosProtocolo['locacao_id'], $dadosProtocolo['protocolo_aluguel'], $dadosProtocolo['resolvido'])) {
            echo "Novo Protocolo criado com sucesso!";
        } else {
            echo "Erro ao criar novo Protocolo.";
        }
    }
} else {
    header("Location: erro.php");
    exit;
}
