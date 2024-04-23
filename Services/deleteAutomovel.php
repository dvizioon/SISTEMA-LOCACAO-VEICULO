<?php
require_once '../Controller/AutomovelController.php';
if (isset($_POST['idAutomovel'])) {
    $idAutomovelParaExcluir = $_POST['idAutomovel'];
    $automovelController = new AutomovelController();
    $excluidoComSucesso = $automovelController->deletarAutomovel($idAutomovelParaExcluir);

    if ($excluidoComSucesso) {
        echo 'Automóvel excluído com sucesso!';
    } else {
        echo 'Erro ao excluir o automóvel.';
    }
} else {
    echo 'ID do automóvel não especificado.';
}
