<?php
require_once '../Controller/ModeloController.php';
if (isset($_POST['idModelo'])) {
    $idModeloParaExcluir = $_POST['idModelo'];
    $modeloController = new ModeloController();
    $excluidoComSucesso = $modeloController->deletarModelo($idModeloParaExcluir);

    if ($excluidoComSucesso) {
        echo 'Modelo excluído com sucesso!';
    } else {
        echo 'Erro ao excluir o Modelo.';
    }
} else {
    echo 'ID do Modelo não especificado.';
}
