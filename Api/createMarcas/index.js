$(document).ready(function () {
    $('#criarMarca').submit(function (event) {
        event.preventDefault();
        var nome = $('#nome_marca').val();
        var dados = {
            nome: nome,
        };

        console.log('Dados a serem enviados:');
        console.log(dados);

        $.ajax({
            url: './Services/createMarcas.php',
            method: 'POST',
            data: dados, 
            success: function (response) {
                console.log(response);
                showMarca()
            },
            error: function (xhr, status, error) {
                console.error('Erro ao enviar dados:', error);
                alert('Erro ao criar Marca. Por favor, tente novamente.');
            }
        });
    });
});
