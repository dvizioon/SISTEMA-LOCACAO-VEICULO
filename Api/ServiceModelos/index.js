function UpModelo(id) {
    $(".id_modelo").html(` #${id}`)

    $.ajax({
        url: './Services/showModelos.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            response.forEach(function (modelos) {
                if (modelos.id === id) {

                    $('#nome_modelo_m').val(modelos.nome);
                    $('#marca_id_m').val(modelos.marca_id);
                    $('#descricao_modelo_m').val(modelos.descricao);
                }
            });


            $(".upBtnMd").off("click").on("click", function () {
                var formData = {
                    id_modelo: id,
                    nome_modelo_m: $('#nome_modelo_m').val(),
                    marcar_id_m: Number($('#marca_id_m').val()),
                    descricao_modelo_m: $('#descricao_modelo_m').val(),
                };

                console.log(formData)

                // Enviar dados atualizados para o servidor via AJAX
                $.ajax({
                    url: './Services/updateModelo.php',
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        alert("Atualizado Com Sucesso...")
                        showModelo();
                        // Se precisar de alguma ação após o sucesso, adicione aqui
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


function deleteModelo(id) {
    if (confirm('Tem certeza que deseja deletar este Modelo?')) {

        $.ajax({
            url: './Services/deleteModelos.php',
            method: 'POST',
            data: {
                "idModelo": id
            },
            success: function (response) {
                console.log(response);
                showModelo();
            },
            error: function (xhr, status, error) {
                console.error('Erro ao Deletar dados:', error);
                alert('Erro ao Deletar Modelo. Por favor, tente novamente.');
            }
        });
    } else {
        console.log('Exclusão cancelada pelo usuário.');
    }
}



$(document).ready(function () {
    showModelo();
});

function showModelo() {
    $.ajax({
        url: './Services/showModelos.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $(".showModelos").empty();

            if (response.length !== 0) {
                response.forEach(function (modelos) {
                    var card = `<div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${modelos.nome}</h5>
                                    <p class="card-text">Descrição: ${modelos.descricao}</p>
                                </div>
                                <div class="card-footer">
                                 <button class="btn bg-info upBtn" data-bs-toggle="modal" data-bs-target="#modalModelo" onclick="UpModelo(${modelos.id})">Atualizar ${modelos.id}</button>
                                 <button class="btn bg-danger" onclick="deleteModelo(${modelos.id})">Deletar</button>
                                </div>
                            </div>`;

                    $(".showModelos").append(card);
                });
            } else {
                $(".showModelos").append("<p>Criar Modelos 〽️</p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao enviar dados:', error);
            alert('Erro ao buscar Modelos. Por favor, tente novamente.');
        }
    });
}