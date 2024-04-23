<?php
require_once '../Controller/ClienteController.php';
if (isset($_POST['idCliente'])) {
    $idClienteParaExcluir = $_POST['idCliente'];
    $clienteController = new ClienteController();
    $excluidoComSucesso = $clienteController->deletarCliente($idClienteParaExcluir);

    if ($excluidoComSucesso) {
        echo 'Cliente excluído com sucesso!';
    } else {
        echo 'Erro ao excluir o CLiente.';
    }
} else {
    echo 'ID do Cliente não especificado.';
}
