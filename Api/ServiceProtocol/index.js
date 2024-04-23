function deleteProtocolo(id) {

    if (confirm('Tem certeza que deseja deletar este Protocolo Isso Apagar Tudo?')) {

        $.ajax({
            url: './Services/findIDProtocol.php',
            method: 'POST',
            data: {
                protocolo_id: id
            },
            success: function (response) {
                console.log(response);

                 $.ajax({
                     url: './Services/deleteLocacao.php',
                     method: 'POST',
                     data: {
                         idLocacao: response.locacao_id
                     },
                     success: function (response) {
                         console.log(response);
                         showLocacao();
                     },
                     error: function (xhr, status, error) {
                         console.error('Erro ao deletar locação:', error);
                         alert('Erro ao deletar locação. Por favor, tente novamente.');
                     }
                 });

                 $.ajax({
                     url: './Services/deleteProtocol.php',
                     method: 'POST',
                     data: {
                         idProtocolo: id
                     },
                     success: function (response) {
                         console.log(response);
                         showProtocol()
                         alert("Protocolo deletado com sucesso.");
                     },
                     error: function (xhr, status, error) {
                         console.error('Erro ao deletar Protocolo:', error);
                         alert('Erro ao deletar Protocolo. Por favor, tente novamente.');
                     }
                 });

            },
            error: function (xhr, status, error) {
                console.error('Erro ao Lista Protocolo:', error);
                alert('Erro ao Lista Protocolo. Por favor, tente novamente.');
            }
        });

    } else {
        console.log('Exclusão cancelada pelo usuário.');
    }
}

function UpProtocol(id) {
    $(".id_protocol").html(` #${id}`)

    $.ajax({
        url: './Services/findIDProtocol.php',
        method: 'POST',
        data: {
            protocolo_id: id
        },
        success: function (response) {
            console.log(response);
            $("#locacao_m").val(response.locacao_id)
            $("#protocolo_name").val(response.protocolo_aluguel)
        },
        error: function (xhr, status, error) {
            console.error('Erro ao Lista Protocolo:', error);
            alert('Erro ao Lista Protocolo. Por favor, tente novamente.');
        }
    });

    $(".upBtnPtc").off("click").on("click", function () {


        var formData = {
            id_protocol: id,
            resolver_protocol: $('#protocolo_m').val(),
        };

        console.log(`Valores Enviados =>`, formData)
        $.ajax({
            url: './Services/protocoresolve.php',
            method: 'POST',
            data: formData,
            success: function (response) {
                console.log(response);
                showProtocol()

            },
            error: function (xhr, status, error) {
                console.error('Erro ao atualizar Protocolo:', error);
                alert('Erro ao atualizar Protocolo. Por favor, tente novamente.');
            }
        });

        var formDataLocacao = {
            id_protocol: $("#locacao_m").val(),
            resolver_locacao: $('#protocolo_m').val(),
        }

        $.ajax({
            url: './Services/locacaoProtocolresolve.php',
            method: 'POST',
            data: formDataLocacao,
            success: function (response) {
                console.log(response);
                showProtocol()

            },
            error: function (xhr, status, error) {
                console.error('Erro ao atualizar Locacao:', error);
                alert('Erro ao atualizar Locacao. Por favor, tente novamente.');
            }
        });

    });

}

$(document).ready(function () {
    showProtocol();
});

function showProtocol() {
    $.ajax({
        url: './Services/showProtocol.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);

            $(".showProtocolos").empty();
            if (Array.isArray(response) && response.length > 0) {
                response.forEach(function (protocoloArray) {
                    console.log(protocoloArray)
                    if (protocoloArray.resolvido === "nao") {
                        var card = `<div class="card">
                                        <div class="card-body">
                                            <div class="card-banner d-flex justify-content-center p-3">
                                                <img width='100' src="${protocoloArray.resolvido === "nao"?"https://cdn-icons-png.flaticon.com/512/6659/6659895.png":"https://cdn-icons-png.flaticon.com/512/148/148767.png"}" title="img.png"/>
                                            </div>
                                            <h1 style='color:red;'>Carro não Entregue ❌...</h1>
                                            <h5 class="card-title">Protocolo: ${protocoloArray.protocolo_aluguel}</h5>
                                            <p class="card-text">ID Carro: ${protocoloArray.id_carro}</p>
                                            <p class="card-text">ID Cliente: ${protocoloArray.id_cliente}</p>
                                            <p class="card-text">Locação ID: ${protocoloArray.locacao_id}</p>
                                            
                                        </div>
                                        <div class="card-footer">
                                        
                                            <button class="btn bg-success text-white" data-bs-toggle="modal" data-bs-target="#modalProtocol" onclick="UpProtocol(${protocoloArray.id})">Resolver Protocolo</button>
                                             <button class="btn bg-danger" onclick="deleteProtocolo(${protocoloArray.id})">Deletar ODS</button>
                                            </div>
                                    </div>`;
                    } else {
                        var card = `<div class="card">
                                        <div class="card-body">
                                            <div class="card-banner d-flex justify-content-center p-3">
                                            <img width='100' src="${protocoloArray.resolvido === "nao"?"https://cdn-icons-png.flaticon.com/512/6659/6659895.png":"https://cdn-icons-png.flaticon.com/512/148/148767.png"}" title="img.png"/>
                                            </div>
                                            <h1 style='color:green;'>Carro Já Entregue...</h1>
                                            <h5 class="card-title">Protocolo: ${protocoloArray.protocolo_aluguel}</h5>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn bg-success text-white" data-bs-toggle="modal" data-bs-target="#modalProtocol" onclick="UpProtocol(${protocoloArray.id})">Reabri Protocolo</button>
                                            <button class="btn bg-danger" onclick="deleteProtocolo(${protocoloArray.id})">Deletar ODS</button>
                                        </div>
                                    </div>`;
                    }

                    $(".showProtocolos").append(card);
                })

            } else {
                $(".showProtocolos").append("<p>Nenhum protocolo encontrado.</p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao buscar dados do protocolo:', error);
            alert('Erro ao buscar protocolos. Por favor, tente novamente.');
        }
    });
}