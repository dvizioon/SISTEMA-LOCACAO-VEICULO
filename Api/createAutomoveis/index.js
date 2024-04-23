$(document).ready(function () {
    $('#criarAutomovel').submit(function (event) {
        event.preventDefault();

        // Captura os valores dos campos do formulário
        var placa = $('#placa').val();
        var img = $('#img')[0].files[0].name;
        var nome = $('#nome').val();
        var cor = $('#cor').val();
        var quilometragem = $('#quilometragem').val();
        var ano = $('#ano').val();
        var portas = $('#portas').val();
        var combustivel = $('#combustivel').val();
        var renavam = $('#renavam').val();
        var chassi = $('#chassi').val();
        var locacao = $('#locacao').val();
        var condicao = $('#condicao').val();
        var protocolo_aluguel = "";
        var modelo_id = $('#modelo').val();
        var marca_id = $('#marca').val();

        // Objeto contendo os dados a serem enviados via AJAX
        var dados = {
            placa: placa,
            img: img,
            nome: nome,
            cor: cor,
            quilometragem: quilometragem,
            ano: ano,
            portas: portas,
            combustivel: combustivel,
            renavam: renavam,
            chassi: chassi,
            locacao: locacao,
            condicao,
            protocolo_aluguel,
            modelo_id: modelo_id,
            marca_id: marca_id
        };

        console.log('Dados a serem enviados:');
        console.log(dados); // Exibe os dados a serem enviados no console

        // Envia os dados via AJAX para o script PHP
        $.ajax({
            url: './Services/createAutomovel.php',
            method: 'POST',
            data: dados, // Envie o objeto 'dados' diretamente como dados
            success: function (response) {
                console.log(response);
                showApi()
                UpApi();
                DeleteApi()
            },
            error: function (xhr, status, error) {
                console.error('Erro ao enviar dados:', error);
                alert('Erro ao criar automóvel. Por favor, tente novamente.');
            }
        });
    });
});
