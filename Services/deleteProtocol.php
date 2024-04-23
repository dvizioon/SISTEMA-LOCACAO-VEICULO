<?php
require_once '../Controller/ProtocolController.php';

if (isset($_POST['idProtocolo'])) {
    $idProtocoloParaExcluir = $_POST['idProtocolo'];
    $protocoloController = new ProtocoloController();
    $excluidoComSucesso = $protocoloController->deletarProtocolo($idProtocoloParaExcluir);

    if ($excluidoComSucesso) {
        echo 'Protocolo excluído com sucesso!';
    } else {
        echo 'Erro ao excluir o Protocolo.';
    }
} else {
    echo 'ID do Protocolo não especificado.';
}
