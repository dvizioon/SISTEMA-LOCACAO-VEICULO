<?php
require_once '../Controller/LocacaoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dadosLocacao = array(
        'id' => isset($_POST['id']) ? $_POST['id'] : null,
        'cliente_id' => isset($_POST['cliente_id']) ? $_POST['cliente_id'] : null,
        'automovel_id' => isset($_POST['automovel_id']) ? $_POST['automovel_id'] : null,
        'protocolo_aluguel' => isset($_POST['protocolo_aluguel']) ? $_POST['protocolo_aluguel'] : null,
        'data_hora_locacao' => isset($_POST['data_hora_locacao']) ? $_POST['data_hora_locacao'] : null,
        'data_hora_devolucao' => isset($_POST['data_hora_devolucao']) ? $_POST['data_hora_devolucao'] : null,
        'protocolo_resolvido' => isset($_POST['protocolo_resolvido']) ? $_POST['protocolo_resolvido'] : 'nao'
    );

    
    if (empty($dadosLocacao['id'])) {
        echo "ID da locação não fornecido.";
        exit;
    }

    $locacaoController = new LocacaoController();
    $locacaoExistente = $locacaoController->listarLocacaoPorId($dadosLocacao['id']);

    if (!$locacaoExistente) {
        echo "Locação não encontrada.";
    } else {
  
        $atualizacaoSucesso = $locacaoController->atualizarLocacao($dadosLocacao);

        if ($atualizacaoSucesso) {
            echo "Locação atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar locação.";
        }
    }
} else {
    echo "Método não permitido.";
    exit;
}
