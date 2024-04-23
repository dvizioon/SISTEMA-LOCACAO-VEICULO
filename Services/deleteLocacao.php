<?php
require_once '../Controller/LocacaoController.php';

if (isset($_POST['idLocacao'])) {
    $idLocacaoParaExcluir = $_POST['idLocacao'];
    $locacaoController = new LocacaoController();
    $excluidoComSucesso = $locacaoController->deletarLocacao($idLocacaoParaExcluir);

    if ($excluidoComSucesso) {
        echo 'Locação excluída com sucesso!';
    } else {
        echo 'Erro ao excluir a Locação.';
    }
} else {
    echo 'ID da Locação não especificado.';
}
