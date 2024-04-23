<?php
require_once '../Controller/ProtocolController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_protocol = isset($_POST['id_protocol']) ? $_POST['id_protocol'] : null;
    $resolver_protocol = isset($_POST['resolver_protocol']) ? $_POST['resolver_protocol'] : null;

    if ($id_protocol === null || $resolver_protocol === null) {
        echo "ID do protocolo ou novo valor não fornecidos.";
        exit;
    }

    try {
        $protocoloController = new ProtocoloController();
        $atualizacaoSucesso = $protocoloController->resolverProtocolo($id_protocol, $resolver_protocol);

        if ($atualizacaoSucesso) {
            echo "Protocolo resolvido atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar protocolo resolvido.";
        }
    } catch (Exception $e) {
        echo "Erro ao processar a solicitação: " . $e->getMessage();
    }
} else {
    echo "Método não permitido.";
    exit;
}
