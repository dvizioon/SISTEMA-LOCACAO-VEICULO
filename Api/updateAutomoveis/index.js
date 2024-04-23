function UpAutomovel(id) {
    $(".id_up").html(id);

    $.ajax({
        url: './Services/showAutomovel.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            response.forEach(function (automovel) {
                if (automovel.id === id) {
                    console.log(response)

                    $('#placa_m').val(automovel.placa);
                    $('#img_m').val("");
                    $('#nome_m').val(automovel.nome);
                    $('#cor_m').val(automovel.cor);
                    $('#quilometragem_m').val(automovel.quilometragem);
                    $('#ano_m').val(automovel.ano);
                    $('#portas_m').val(automovel.quantidade_portas);
                    $('#combustivel_m').val(automovel.tipoCombustivel);
                    $('#renavam_m').val(automovel.RENAVAM);
                    $('#chassi_m').val(automovel.chassi);
                    $('#locacao_m').val(automovel.locacao);
                    $('#condicao_m').val(automovel.condicao);
                    $('#prt_id').val(automovel.protocolo_aluguel);
                    $('#modelo_m').val(automovel.modelo_id);
                    $('#marca_m').val(automovel.marca_id);

                    $.ajax({
                        url: './Services/findIDMarca.php',
                        method: 'POST',
                        data: {
                            marca_id:automovel.marca_id
                        },
                        success: function (response) {
                            $("#marca_m").append(`<option value='${response.id}'>${response.nome}</option>`)
                        }
                    })
                }

            });


            $(".upBtn").off("click").on("click", function () {
                var formData = {
                    id_m: id,
                    placa_m: $('#placa_m').val(),
                    img_m: $('#img_m').val(),
                    nome_m: $('#nome_m').val(),
                    cor_m: $('#cor_m').val(),
                    quilometragem_m: $('#quilometragem_m').val(),
                    ano_m: $('#ano_m').val(),
                    quantidade_portas_m: $('#portas_m').val(),
                    tipoCombustivel_m: $('#combustivel_m').val(),
                    renavam_m: $('#renavam_m').val(),
                    chassi_m: $('#chassi_m').val(),
                    condicao_m: $("#condicao_m").val(),
                    locacao_m: $('#locacao_m').val(),
                    modelo_id_m: $('#modelo_m').val(),
                    marca_id_m: $('#marca_m').val()
                };

                console.log(formData)

                // Enviar dados atualizados para o servidor via AJAX
                $.ajax({
                    url: './Services/updateAutomovel.php',
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        UpApi();
                        showApi();
                        DeleteApi();
                        alert("Atualizado Com Sucesso...")

                        // Se precisar de alguma ação após o sucesso, adicione aqui
                    },
                    error: function (xhr, status, error) {
                        console.error('Erro ao atualizar automóvel:', error);
                        alert('Erro ao atualizar automóvel. Por favor, tente novamente.');
                    }
                });
            });
        },
        error: function (xhr, status, error) {
            console.error('Erro ao Atualizar dados:', error);
            alert('Erro ao Atualizar automóveis. Por favor, tente novamente.');
        }
    });
}


$(document).ready(function () {
    UpApi();
});


function UpApi() {
    $.ajax({
        url: './Services/showAutomovel.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $(".UpAutomovis").empty();

            if (response.length !== 0) {
                response.forEach(function (automovel) {
                    var card = `<div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${automovel.nome}</h5>
                                    <p class="card-text">Placa: ${automovel.placa}</p>
                                    <p class="card-text">Locação: R$ ${automovel.locacao}</p>
                                    <button class="btn bg-info upBtn" data-bs-toggle="modal" data-bs-target="#modalAutomovel" onclick="UpAutomovel(${automovel.id})">Atualizar</button>
                                </div>
                            </div>`;
                    $(".UpAutomovis").append(card);
                });
            } else {
                $(".UpAutomovis").append("<p>Nada para Atualizar...</p>");
            }

        },
        error: function (xhr, status, error) {
            console.error('Erro ao enviar dados:', error);
            alert('Erro ao buscar automóveis. Por favor, tente novamente.');
        }
    });
}