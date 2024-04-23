function UpMarca(id) {
    $(".id_marca").html(` #${id}`)

    $.ajax({
        url: './Services/showMarcas.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            response.forEach(function (marcas) {
                if (marcas.id === id) {
                    // console.log(`Construindo ${marcas.id} => M:${id} =r:${marcas.id === id}`)
                    $('#nome_marca_m').val(marcas.nome);
                }
            });


            $(".upBtnMc").off("click").on("click", function () {
                var formData = {
                    id_marca: id,
                    nome_marca_m: $('#nome_marca_m').val(),
                };

                console.log(formData)

                // Enviar dados atualizados para o servidor via AJAX
                $.ajax({
                    url: './Services/updateMarcas.php',
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        alert("Atualizado Com Sucesso...")
                        showMarca();
                        // Se precisar de alguma ação após o sucesso, adicione aqui
                    },
                    error: function (xhr, status, error) {
                        console.error('Erro ao atualizar Marca:', error);
                        alert('Erro ao atualizar Marca. Por favor, tente novamente.');
                    }
                });
            });
        },
        error: function (xhr, status, error) {
            console.error('Erro ao Atualizar dados:', error);
            alert('Erro ao Atualizar Marca. Por favor, tente novamente.');
        }
    });

}


function deleteMarca(id) {
    if (confirm('Tem certeza que deseja deletar esta Marca ?')) {

        $.ajax({
            url: './Services/deleteMarcas.php',
            method: 'POST',
            data: {
                "idMarca": id
            },
            success: function (response) {
                console.log(response);
                showMarca();
            },
            error: function (xhr, status, error) {
                console.error('Erro ao Deletar dados:', error);
                alert('Erro ao Deletar Marca. Por favor, tente novamente.');
            }
        });
    } else {
        console.log('Exclusão cancelada pelo usuário.');
    }
}



$(document).ready(function () {
    showMarca();
});

function showMarca() {
    $.ajax({
        url: './Services/showMarcas.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $(".showMarcas").empty();

            if (response.length !== 0) {
                response.forEach(function (marca) {
                    var card = `<div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${marca.nome}</h5>
                                </div>
                                <div class="card-footer">
                                 <button class="btn bg-info upBtn" data-bs-toggle="modal" data-bs-target="#modalMarca" onclick="UpMarca(${marca.id})">Atualizar ${marca.id}</button>
                                 <button class="btn bg-danger" onclick="deleteMarca(${marca.id})">Deletar</button>
                                </div>
                            </div>`;

                    $(".showMarcas").append(card);
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