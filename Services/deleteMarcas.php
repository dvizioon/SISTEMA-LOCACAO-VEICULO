<?php
require_once '../Controller/MarcaController.php';
if (isset($_POST['idMarca'])) {
    $idMarcaParaExcluir = $_POST['idMarca'];
    $marcaController = new MarcaController();
    $excluidoComSucesso = $marcaController->deletarMarca($idMarcaParaExcluir);

    if ($excluidoComSucesso) {
        echo 'Marca excluído com sucesso!';
    } else {
        echo 'Erro ao excluir a Marca.';
    }
} else {
    echo 'ID do Modelo não especificado.';
}
