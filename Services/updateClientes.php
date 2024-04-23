<?php
require_once '../Controller/ClienteController.php';

$clienteController = new ClienteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dadosCliente = array(
        'id' => isset($_POST['id_m']) ? $_POST['id_m'] : null,
        'nome' => isset($_POST['nome_m']) ? $_POST['nome_m'] : null,
        'cpf' => isset($_POST['cpf_m']) ? $_POST['cpf_m'] : null,
        'rg' => isset($_POST['rg_m']) ? $_POST['rg_m'] : null,
        'numero' => isset($_POST['numero_m']) ? $_POST['numero_m'] : null,
        'email' => isset($_POST['email_m']) ? $_POST['email_m'] : null,
        'pai' => isset($_POST['pai_m']) ? $_POST['pai_m'] : null,
        'mae' => isset($_POST['mae_m']) ? $_POST['mae_m'] : null,
        'antecedents' => isset($_POST['antecedents_m']) ? $_POST['antecedents_m'] : null
    );

    // Verifique se o ID do cliente foi fornecido
    if (empty($dadosCliente['id'])) {
        echo "ID do cliente não fornecido.";
        exit;
    }

    // Verifique se os campos obrigatórios estão preenchidos
    $camposObrigatorios = ['nome', 'cpf', 'rg', 'numero', 'email', 'pai', 'mae'];
    $camposFaltantes = array_diff($camposObrigatorios, array_keys(array_filter($dadosCliente)));

    if (!empty($camposFaltantes)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Verifique se o cliente existe antes de tentar atualizar
        $clienteExistente = $clienteController->listarClienteID($dadosCliente['id']);

        if (!$clienteExistente) {
            echo "Cliente não encontrado.";
        } else {
            // Atualize o cliente
            if ($clienteController->atualizarCliente($dadosCliente)) {
                echo "Cliente atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar cliente.";
            }
        }
    }
} else {
    header("Location: erro.php");
    exit;
}
