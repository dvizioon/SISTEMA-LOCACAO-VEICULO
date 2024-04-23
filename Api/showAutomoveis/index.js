function showApi() {
    $.ajax({
        url: './Services/showAutomovel.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response); 
            $(".showAutomovis").empty();

            if (response.length !== 0) {
                response.forEach(function (automovel) {
                    if (automovel.condicao === "Habilitado") {
                        var card = `<div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${automovel.nome}</h5>
                                    <p class="card-text">Placa: ${automovel.placa}</p>
                                    <p class="card-text">Cor: ${automovel.cor}</p>
                                    <p class="card-text">Ano: ${automovel.ano}</p>
                                    <p class="card-text">Locação: R$ ${automovel.locacao}</p>
                                    <p class="card-text">Estado: <span style="color:${automovel.condicao === "Habilitado" ? "green" : "red"}">${automovel.condicao}</span></p>
                                </div>
                            </div>`;

                        $(".showAutomovis").append(card);
                    } else {
                         var card = `<div class="card">
                                <div class="card-body">
                                    <h1 class="card-title">Não Qualificado... ❌</h1>
                                    <h5 class="card-title">${automovel.nome}</h5>
                                    <hr>
                                    <p class="card-text">Placa:#${automovel.placa}</p>
                                    <p class="card-text">Estado: <span style="color:${automovel.condicao === "Habilitado" ? "green" : "red"}">${automovel.condicao}</span></p>
                                </div>
                            </div>`;

                         $(".showAutomovis").append(card);
                    }
                });
            } else {
                $(".showAutomovis").append("<p>Criar Automoveis 🚗</p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao enviar dados:', error);
            alert('Erro ao buscar automóveis. Por favor, tente novamente.');
        }
    });
}

showApi();