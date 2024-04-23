function updateLocacao(id) {
    $(".id_locacao").html(`#${id}`);

    function carregarClienteID(id) {
        $.ajax({
            url: './Services/findIDCliente.php',
            method: 'POST',
            data: {
                cliente_id: id
            },
            success: function (cliente) {
                console.log(cliente)
                $('#cliente_id_m').empty();
                var option = `<option value="${cliente.id}">${cliente.nome}</option>`;
                $('#cliente_id_m').append(option);

            },
            error: function (xhr, status, error) {
                console.error('Erro ao carregar clientes:', error);
                alert('Erro ao carregar clientes. Por favor, tente novamente.');
            }
        });
    }

    function carregarCarroID(id) {
        $.ajax({
            url: './Services/findIDAutomovel.php',
            method: 'POST',
            data: {
                automovel_id: id
            },
            success: function (automoveis) {
                $('#carro_id_m').empty();

                automoveis.forEach(function (automovel) {
                    var option = `<option value="${automovel.id}">${automovel.nome}</option>`;
                    $('#carro_id_m').append(option);
                });
            },
            error: function (xhr, status, error) {
                console.error('Erro ao carregar automóveis:', error);
                alert('Erro ao carregar automóveis. Por favor, tente novamente.');
            }
        });
    }

    $.ajax({
        url: './Services/showLocacao.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {

            response.forEach(function (locacao) {
                if (locacao.id === id) {
                    // console.log(locacao.id === id)
                    // console.log(locacao)
                    carregarClienteID(locacao.cliente_id);
                    carregarCarroID(locacao.automovel_id);
                    $("#protocol_uuid4").val(locacao.protocolo_aluguel)
                    $('#cliente_id_m').val(locacao.cliente_id);
                    $('#carro_id_m').val(locacao.automovel_id);
                    $('#data_hora_locacao_m').val(locacao.data_hora_locacao);
                    $('#data_hora_devolucao_m').val(locacao.data_hora_devolucao);
                }
            });

            $(".upBtnLc").off("click").on("click", function () {
                var formData = {
                    id: id,
                    protocolo_aluguel: $("#protocol_uuid4").val(),
                    cliente_id: $('#cliente_id_m').val(),
                    automovel_id: $('#carro_id_m').val(),
                    data_hora_locacao: $('#data_hora_locacao_m').val(),
                    data_hora_devolucao: $('#data_hora_devolucao_m').val()
                };


                $.ajax({
                    url: './Services/updateLocacao.php',
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        alert("Locação atualizada com sucesso!");
                        showLocacao();
                    },
                    error: function (xhr, status, error) {
                        console.error('Erro ao atualizar Locação:', error);
                        alert('Erro ao atualizar Locação. Por favor, tente novamente.');
                    }
                });
            });
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados da Locação:', error);
            alert('Erro ao obter dados da Locação. Por favor, tente novamente.');
        }
    });
}



function deleteLocacao(locacaoId) {

    if (confirm("Tem certeza que deseja deletar esta locação?")) {

        $.ajax({
            url: './Services/deleteLocacao.php',
            method: 'POST',
            data: {
                idLocacao: locacaoId
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
    }
}

$(document).ready(function () {
    showLocacao();
});

function showLocacao() {

    function carregarClientes() {
        $.ajax({
            url: './Services/showClientes.php',
            method: 'GET',
            dataType: 'json',
            success: function (clientes) {
                $('#cliente_id').empty();

                clientes.forEach(function (cliente) {

                    var option = `<option value="${cliente.id}">${cliente.nome}</option>`;

                    $('#cliente_id').append(option);
                });
            },
            error: function (xhr, status, error) {
                console.error('Erro ao carregar clientes:', error);
                alert('Erro ao carregar clientes. Por favor, tente novamente.');
            }
        });
    }


    function carregarCarro() {
        $.ajax({
            url: './Services/showAutomovel.php',
            method: 'GET',
            dataType: 'json',
            success: function (automoveis) {
                $('#carro_id').empty();

                automoveis.forEach(function (automovel) {

                    var option = `<option value="${automovel.id}">${automovel.nome}</option>`;
                    $('#carro_id').append(option);
                });
            },
            error: function (xhr, status, error) {
                console.error('Erro ao carregar automóveis:', error);
                alert('Erro ao carregar automóveis. Por favor, tente novamente.');
            }
        });
    }

    carregarClientes();
    carregarCarro();

    function carregarClientPorID(id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: './Services/findIDCliente.php',
                method: 'POST',
                data: {
                    cliente_id: id
                },
                success: function (cliente) {
                    resolve(cliente); // Resolve a promise com os dados do cliente
                },
                error: function (xhr, status, error) {
                    reject(error); // Rejeita a promise em caso de erro
                }
            });
        });
    }

    function carregarCarroPorID(id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: './Services/findIDAutomovel.php', 
                method: 'POST', 
                data: {
                    automovel_id: id 
                },
                success: function (automoveis) {
                    
                    resolve(automoveis);
                },
                error: function (xhr, status, error) {
                    console.error('Erro ao carregar automóveis:', error);
                    reject(new Error('Erro ao carregar automóveis. Por favor, tente novamente.'));
                }
            });
        });
    }



    $.ajax({
        url: './Services/showLocacao.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            $(".showLocacao").empty();

            if (response.length !== 0) {

                response.forEach(function (locacao) {
                    console.log(locacao)

                    carregarClientPorID(locacao.cliente_id)
                        .then(clienteInformacoes => {
                            console.log(clienteInformacoes);
                            $(".nome_cliente").html(`NOME : ${clienteInformacoes.nome}`)
                            $(".cpf_cliente").html(`CPF : ${clienteInformacoes.cpf}`)
                            $(".telefone").html(`Telefone : ${clienteInformacoes.numero}`)
                            $(".email").html(`Email : ${clienteInformacoes.email}`)
                        })
                    

                    carregarCarroPorID(locacao.automovel_id)
                        .then(automoveis => {
                            console.log(automoveis);
                            automoveis.forEach((automoveis) => {
                                $(".nome_carro").html(`NOME : ${automoveis.nome}`)
                                $(".RENAVAM").html(`RENAVAM : ${automoveis.RENAVAM}`)
                                $(".chassi").html(`CHASSI : ${automoveis.chassi}`)
                                $(".placa").html(`PLACA : ${automoveis.placa}`)
                                $(".protocolo_aluguel").html(`PROTOCOLO_PEDIDO : ${automoveis.protocolo_aluguel}`)
                            })
                        })
                        .catch(error => {
                            console.error('Erro ao carregar automóveis:', error.message);
                        });

                    //  $.ajax({
                    //      url: './Services/findIDCliente.php',
                    //      method: 'POST',
                    //      data: {
                    //          cliente_id: id
                    //      },
                    //      success: function (cliente) {
                    //          console.log(cliente)
                    //          return cliente


                    //      },
                    //      error: function (xhr, status, error) {
                    //          console.error('Erro ao carregar clientes:', error);
                    //          alert('Erro ao carregar clientes. Por favor, tente novamente.');
                    //      }
                    //  });


                    if (locacao.protocol_resolvido === "nao") {
                        var card = `<div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">ID: ${locacao.id}</h5>
                                        <p class="nome_cliente"></p>
                                        <p>Automóvel ID: ${locacao.automovel_id}</p>
                                        <p>Data de Locação: ${locacao.data_hora_locacao}</p>
                                        <p>Data de Devolução: ${locacao.data_hora_devolucao}</p>
                                        
                                        <p>Protocolo do Pedido: <span style='color:green;'>${locacao.protocolo_aluguel}</span></p>
                                      <details>
                                        <summary>detalhes dos Clientes</summary>
                                        <hr>
                                        <p class="nome_cliente"></p>
                                        <p class="cpf_cliente"></p>
                                        <p class="telefone"></p>
                                        <p class="email"></p>
                                        <hr>
                                      </details>
                                      <details>
                                        <summary>detalhes dos Automóvel</summary>
                                        <hr>
                                        <p class = "nome_carro"></p>
                                        <p class = "RENAVAM"></p>
                                        <p class = "placa"></p>
                                        <p class ="chassi"></p>
                                        <p class ="protocolo_aluguel"></p>
                                        <hr>
                                      </details>
                                    
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn bg-info upBtn" data-bs-toggle="modal" data-bs-target="#modalLocacao" onclick="updateLocacao(${locacao.id})">Atualizar</button>
                                        <!-- <button class="btn bg-danger" onclick="deleteLocacao(${locacao.id})">Deletar</button> -->
                                    </div>
                                </div>`;
                    } else {
                        var card = `<div class="card">
                                    <div class="card-body">
                                    <div class="card-banner d-flex justify-content-center align-items-center gap-3 p-3">
                                        <img width='100' src="${locacao.resolvido === "nao"?"https://cdn-icons-png.flaticon.com/512/6659/6659895.png":"https://cdn-icons-png.flaticon.com/512/148/148767.png"}" title="img.png"/>
                                        <h1 class="card-title text-success ">Carro Entregue</h1>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">ID: ${locacao.id}</h5>
                                        <p>Protocolo do Pedido: <span style='color:green;'>${locacao.protocolo_aluguel}</span></p>
                                        <details>
                                        <summary>detalhes dos Clientes</summary>
                                        <hr>
                                        <p class="nome_cliente"></p>
                                        <p class="cpf_cliente"></p>
                                        <p class="telefone"></p>
                                        <p class="email"></p>
                                        <hr>
                                      </details>
                                      <details>
                                        <summary>detalhes dos Automóvel</summary>
                                        <hr>
                                        <p class = "nome_carro"></p>
                                        <p class = "RENAVAM"></p>
                                        <p class = "placa"></p>
                                        <p class ="chassi"></p>
                                        <p class ="protocolo_aluguel"></p>
                                        <hr>
                                      </details>
                                    </div>
                                </div>`;
                    }



                    $(".showLocacao").append(card);
                });
            } else {

                $(".showLocacao").append("<p>Nenhuma locação encontrada.</p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao buscar Locações:', error);
            alert('Erro ao buscar Locações. Por favor, tente novamente.');
        }
    });
}