function marcasToOption() {
    $.ajax({
        url: './Services/showMarcas.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $(".showMarcas").empty();

            if (response.length !== 0) {
                response.forEach(function (marca) {
                     $("#marca_id").append(`<option value="${marca.id}">${marca.nome}</option>`)
                     $("#marca_id_m").append(`<option value="${marca.id}">${marca.nome}</option>`)
                });
            } else {
                $(".showMarcas").append("<p>Criar Marca 🪼 </p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao enviar dados:', error);
            alert('Erro ao buscar Marcas. Por favor, tente novamente.');
        }
    });
}

marcasToOption()