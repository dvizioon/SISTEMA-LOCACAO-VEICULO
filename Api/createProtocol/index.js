function createProtocol(_automovel_id, _id_cliente, _locacao_id, _protocolo_aluguel, _resolvido) {
    var _automovel_id_ = _automovel_id;
    var _id_cliente_ = _id_cliente;
    var _locacao_id_ = _locacao_id;
    var _protocolo_aluguel_ = _protocolo_aluguel;
    var _resolvido_ = _resolvido;

    var dadosProtocolo = {
        id_carro: _automovel_id_,
        id_cliente: _id_cliente_,
        locacao_id: _locacao_id_,
        protocolo_aluguel: _protocolo_aluguel_,
        resolvido: _resolvido_
    };

    console.log('Dados do Protocolo a serem enviados:');
    console.log(dadosProtocolo);

    // Envio da requisição AJAX após o carregamento do DOM
    $(document).ready(function () {
        $.ajax({
            url: './Services/createProtocol.php',
            method: 'POST',
            data: dadosProtocolo,
            success: function (response) {
                console.log(response);
                alert('Novo Protocolo criado com sucesso!');
                // Adicione aqui a lógica para manipular a resposta, se necessário
            },
            error: function (xhr, status, error) {
                console.error('Erro ao criar Protocolo:', error);
                alert('Erro ao criar Protocolo. Por favor, tente novamente.');
            }
        });
    });
}
