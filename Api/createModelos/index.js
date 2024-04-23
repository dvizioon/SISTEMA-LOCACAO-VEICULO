$(document).ready(function () {
    $('#criarModelo').submit(function (event) {
        event.preventDefault();


        var nome = $('#nome_modelo').val();
        var marca_id = $('#marca_id').val();
        var descricao = $('#descricao_modelo').val();

        var dados = {
            nome: nome,
            marca_id: marca_id,
            descricao: descricao
        };

        console.log('Dados a serem enviados:');
        console.log(dados); 

        $.ajax({
            url: './Services/createModelos.php',
            method: 'POST',
            data: dados, // Envie o objeto 'dados' diretamente como dados
            success: function (response) {
                console.log(response);
                showModelo()
            },
            error: function (xhr, status, error) {
                console.error('Erro ao enviar dados:', error);
                alert('Erro ao criar Modelo. Por favor, tente novamente.');
            }
        });
    });
});
