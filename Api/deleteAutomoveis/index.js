
function deleteAutomovel(id) {
    if (confirm('Tem certeza que deseja deletar este automóvel?')) {

        $.ajax({
            url: './Services/deleteAutomovel.php',
            method: 'POST',
            data: {
                "idAutomovel": id
            },
            success: function (response) {
                console.log(response);
                showApi();
                UpApi();
                DeleteApi();
            },
            error: function (xhr, status, error) {
                console.error('Erro ao Deletar dados:', error);
                alert('Erro ao Deletar automóvel. Por favor, tente novamente.');
            }
        });
    } else {
        console.log('Exclusão cancelada pelo usuário.');
    }
}


$(document).ready(function () {
    DeleteApi();
});

function DeleteApi() {
    $.ajax({
        url: './Services/showAutomovel.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $(".DelAutomovis").empty();
    
            if (response.length !== 0) {
                response.forEach(function (automovel) {
                    var card = `<div class="card">                               
                                <div class="card-body">
                                    <h5 class="card-title">${automovel.nome}</h5>
                                    <p class="card-text">Placa: ${automovel.placa}</p>
                                    <p class="card-text">Locação: R$ ${automovel.locacao}</p>
                                    <button class="btn bg-danger" onclick="deleteAutomovel(${automovel.id})">Deletar</button>
                                </div>
                            </div>`;
                    $(".DelAutomovis").append(card);
                });
            } else {
                $(".DelAutomovis").append("<p>Nada para Deletar...</p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao Deletar dados:', error);
            alert('Erro ao Deletar automóveis. Por favor, tente novamente.');
        }
    });
}
