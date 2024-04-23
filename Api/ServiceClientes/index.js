function UpCliente(id) {
    $(".id_cliente").html(` #${id}`)

    $.ajax({
        url: './Services/showClientes.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            response.forEach(function (cliente) {
                if (cliente.id === id) {

                    $('#nome_m').val(cliente.nome);
                    $('#cpf_m').val(cliente.cpf);
                    $('#rg_m').val(cliente.rg);
                    $('#numero_m').val(cliente.numero);
                    $('#email_m').val(cliente.email);
                    $('#pai_m').val(cliente.pai);
                    $('#mae_m').val(cliente.mae);
                    $('#antecedents_m').val(cliente.antecedents);
                }
            });


            $(".upBtnCl").off("click").on("click", function () {
                var formData = {
                    id_m:id,
                    nome_m: $('#nome_m').val(),
                    cpf_m: $('#cpf_m').val(),
                    rg_m: $('#rg_m').val(),
                    numero_m: $('#numero_m').val(),
                    email_m: $('#email_m').val(),
                    pai_m: $('#pai_m').val(),
                    mae_m: $('#mae_m').val(),
                    antecedents_m: $('#antecedents_m').val(),
                };

                console.log(formData)

                $.ajax({
                    url: './Services/updateClientes.php',
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        alert("Atualizado Com Sucesso...")
                        
                        showClientes();
                        showClientesEmail()

                    },
                    error: function (xhr, status, error) {
                        console.error('Erro ao atualizar Modelo:', error);
                        alert('Erro ao atualizar Modelo. Por favor, tente novamente.');
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

function sendEmailClient(id) {
    $(".id_cliente_email").html(id)

    function CarregarEmails(id) {
        $.ajax({
            url: './Services/showClientes.php',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                response.forEach(function (cliente) {
                    if (cliente.id === id) {

                        $('#send_email_m_template').val(cliente.email);
                        $('#send_email_m').val(cliente.email);
                    }
                });
            }
        })
    }

    // sendEmail_template

    CarregarEmails(id)

    $(".upBtnSendAviso_template").off("click").on("click", function () {
        var formData = {
            id_m: id,
            email: $('#send_email_m_template').val(),
            data_hora_locacao: "20:00",
            body:false,
            tmp:""
        };

        console.log(formData)

        $.ajax({
            url: './Utils/Email/SendEmail.php',
            method: 'POST',
            data: formData,
            success: function (response) {
                console.log(response);
                alert("Atualizado Com Sucesso...")

            },
            error: function (xhr, status, error) {
                console.error('Erro ao atualizar Modelo:', error);
                alert('Erro ao atualizar Modelo. Por favor, tente novamente.');
            }
        });
    });


    $(".upBtnSendAviso").off("click").on("click", function () {
        var formData = {
            id_m: id,
            email: $('#send_email_m_template').val(),
            data_hora_locacao: "20:00",
            body: $("#template_m").val(),
            tmp: "yes"
        };

        console.log(formData)

        $.ajax({
            url: './Utils/Email/SendEmail.php',
            method: 'POST',
            data: formData,
            success: function (response) {
                console.log(response);
                alert("Atualizado Com Sucesso...")

            },
            error: function (xhr, status, error) {
                console.error('Erro ao atualizar Modelo:', error);
                alert('Erro ao atualizar Modelo. Por favor, tente novamente.');
            }
        });
    });
}

function deleteCliente(id) {
    if (confirm('Tem certeza que deseja deletar este Cliente?')) {
        $.ajax({
            url: './Services/deleteClientes.php',
            method: 'POST',
            data: {
                idCliente: id
            },
            success: function (response) {
                console.log(response);
                showClientes();
                showClientesEmail()
                alert("Cliente deletado com sucesso.");
            },
            error: function (xhr, status, error) {
                console.error('Erro ao deletar Cliente:', error);
                alert('Erro ao deletar Cliente. Por favor, tente novamente.');
            }
        });
    } else {
        console.log('Exclusão cancelada pelo usuário.');
    }
}



$(document).ready(function () {
    showClientes();
    showClientesEmail()
});

function showClientes() {
    $.ajax({
        url: './Services/showClientes.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $(".showClientes").empty();

            if (response.length !== 0) {
                response.forEach(function (cliente) {
                    var card = `<div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">${cliente.nome}</h5>
                                        <p class="card-text">CPF: ${cliente.cpf}</p>
                                         <p class="card-text">Numero: ${cliente.numero}</p>
                                         <p class="card-text">Email: ${cliente.email}</p>
                                         <p class="card-text">Criminais : ${cliente.antecedents}</p>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn bg-info upBtn" data-bs-toggle="modal" data-bs-target="#modalCliente" onclick="UpCliente(${cliente.id})">Atualizar</button>
                                        <button class="btn bg-danger" onclick="deleteCliente(${cliente.id})">Deletar</button>
                                    </div>
                                </div>`;

                    $(".showClientes").append(card);
                });
            } else {
                $(".showClientes").append("<p>Nenhum cliente cadastrado.</p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao buscar clientes:', error);
            alert('Erro ao buscar clientes. Por favor, tente novamente.');
        }
    });
}



function showClientesEmail() {
    $.ajax({
        url: './Services/showClientes.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $(".showClientesEmail").empty();

            if (response.length !== 0) {
                response.forEach(function (cliente) {
                    var card = `<div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">${cliente.nome}</h5>
                                        <p class="card-text">CPF: ${cliente.cpf}</p>
                                         <p class="card-text">Email: ${cliente.email}</p>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn bg-danger emailBtn" data-bs-toggle="modal" data-bs-target="#modalClienteEmail" onclick="sendEmailClient(${cliente.id})">Enviar Email</button>
                                    </div>
                                </div>`;

                    $(".showClientesEmail").append(card);
                });
            } else {
                $(".showClientesEmail").append("<p>Impossivel Autenticar no APP_EMAIL.</p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao buscar clientes:', error);
            alert('Erro ao buscar clientes. Por favor, tente novamente.');
        }
    });
}