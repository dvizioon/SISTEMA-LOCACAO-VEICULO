<?php
require_once '../Controller/MarcaController.php';

$marcaController = new MarcaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dadosmarca = array(
        'nome' => isset($_POST['nome']) ? $_POST['nome'] : null,
    );

    // var_dump($dadosmodelos);

    if (empty($dadosmarca['nome'])) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {

        if ($marcaController->criarMarca($dadosmarca)) {
            echo "Nova Marca criado com sucesso!";
        } else {
            echo "Erro ao criar nova Marca.";
        }
    }
} else {
    header("Location: erro.php");
    exit;
}
