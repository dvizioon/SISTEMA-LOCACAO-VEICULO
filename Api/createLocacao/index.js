$(document).ready(function () {
    $('#criarLocacao').submit(function (event) {
        event.preventDefault();

        var cliente_id = $('#cliente_id').val();
        var automovel_id = $('#carro_id').val();
        var data_hora_locacao = $('#data_hora_locacao').val();
        var data_hora_devolucao = $('#data_hora_devolucao').val();


        var protocolo_aluguel = generateUUID();

        var dadosLocacao = {
            cliente_id: cliente_id,
            automovel_id: automovel_id,
            protocolo_aluguel: protocolo_aluguel,
            data_hora_locacao: data_hora_locacao,
            data_hora_devolucao: data_hora_devolucao,
            protocol_resolvido: 'nao'
        };

        console.log('Dados da Locação a serem enviados:');
        console.log(dadosLocacao);

        $.ajax({
            url: './Services/protocoloAutomovel.php',
            method: 'POST',
            data: {
                automovel_id: automovel_id,
                novo_protocolo: protocolo_aluguel
            },
            success: function (response) {
                console.log(response);
                showLocacao();
            },
            error: function (xhr, status, error) {
                console.error('Erro ao enviar dados da Locação:', error);
                alert('Erro ao criar Locação. Por favor, tente novamente.');
            }
        });

        $.ajax({
            url: './Services/createLocacao.php',
            method: 'POST',
            data: dadosLocacao,
            success: function (response) {
                console.log(response)
                createProtocol(
                    response.automovel_id,
                    response.cliente_id,
                    response.id,
                    response.protocolo_aluguel,
                    "nao"
                )
                // createProtocol(_automovel_id, _id_cliente, _locacao_id, _protocolo_aluguel, _resolvido)
                // console.log(response.id)
                // console.log(response.automovel_id)
                showLocacao();
            },
            error: function (xhr, status, error) {
                console.error('Erro ao enviar dados da Locação:', error);
                alert('Erro ao criar Locação. Por favor, tente novamente.');
            }
        });
    });
});

function generateUUID() { 
    var d = new Date().getTime();
    if (typeof performance !== 'undefined' && typeof performance.now === 'function') {
        d += performance.now(); 
    }
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = (d + Math.random() * 16) % 16 | 0;
        d = Math.floor(d / 16);
        return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
}
