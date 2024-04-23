$(document).ready(function () {
    $('#criarCliente').submit(function (event) {
        event.preventDefault();

        var nome = $('#nome').val();
        var cpf = $('#cpf').val();
        var rg = $('#rg').val();
        var numero = $('#numero').val();
        var email = $('#email').val();
        var pai = $('#pai').val();
        var mae = $('#mae').val();
        var antecedents = $('#antecedents').val();

        var dados = {
            nome: nome,
            cpf: cpf,
            rg: rg,
            numero: numero,
            email: email,
            pai: pai,
            mae: mae,
            antecedents: antecedents
        };

        console.log('Dados a serem enviados:');
        console.log(dados);

        $.ajax({
            url: './Services/createClientes.php',
            method: 'POST',
            data: dados,
            success: function (response) {
                console.log(response);
                showClientes()
                showClientesEmail()
            },
            error: function (xhr, status, error) {
                console.error('Erro ao enviar dados:', error);
                alert('Erro ao criar Cliente. Por favor, tente novamente.');
            }
        });
    });
});
