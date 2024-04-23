<?php
require_once '../Controller/LocacaoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id_protocol']) ? $_POST['id_protocol'] : null;
    $novoValor = isset($_POST['resolver_locacao']) ? $_POST['resolver_locacao'] : null;
    if (empty($id) || $novoValor === null) {
        echo "ID da locação ou novo valor não fornecidos.";
        exit;
    }
    try {
        $locacaoController = new LocacaoController();
        $atualizacaoSucesso = $locacaoController->atualizarProtocoloResolvido($id, $novoValor);
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
