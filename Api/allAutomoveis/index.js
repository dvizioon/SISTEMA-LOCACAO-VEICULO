async function selecteService(name,id_name) {
     $(name).on('change', function () {
         const selectedValue = $(this).val();

         // Função para carregar o modelo selecionado
         function carregarModelo(id) {
             return new Promise(function (resolve, reject) {
                 $.ajax({
                     url: './Services/findIDModelo.php',
                     method: 'POST',
                     data: {
                         modelo_id: id
                     },
                     success: function (response) {
                         resolve(response);
                     },
                     error: function (xhr, status, error) {
                         console.error('Erro ao enviar dados:', error);
                         reject(error);
                     }
                 });
             });
         }

         // Carregar o modelo selecionado e depois carregar a marca correspondente
         carregarModelo(selectedValue)
             .then(function (dados) {
                 // Verificar se os dados do modelo são válidos
                 if (dados && dados.marca_id) {
                     // Limpar opções de marca antes de adicionar novas
                     $(id_name).empty();
                     // Carregar a marca correspondente ao modelo
                     $.ajax({
                         url: './Services/findIDMarca.php',
                         method: 'POST',
                         data: {
                             marca_id: dados.marca_id
                         },
                         success: function (marca) {
                             // Verificar se a marca foi encontrada
                             if (marca && marca.id && marca.nome) {
                                 $(id_name).append(`<option value="${marca.id}">${marca.nome}</option>`);
                             } else {
                                 $(id_name).append(`<option value="">Sem Marca Associada</option>`); 
                             }
                         },
                         error: function (xhr, status, error) {
                             console.error('Erro ao buscar dados da Marca:', error);
                         }
                     });
                 } else {
                     // Dados do modelo inválidos ou ausentes
                     $(id_name).empty();


                     $(id_name).append(`<option value="">Sem Marca Associada ❌</option>`);

                     const data = JSON.parse(dados)
                     console.log(data)

                     //  alert('Dados do Modelo inválidos. Por favor, tente novamente.');
                 }
             })
             .catch(function (error) {
                 console.error('Erro ao carregar modelo:', error);
                 alert('Erro ao buscar dados do Modelo. Por favor, tente novamente.');
             });

     });
}

function modelosToOption() {
    $.ajax({
        url: './Services/showModelos.php',
        method: 'GET',
        dataType: 'json',
        success: async function (response) {
            if (response.length !== 0) {
                // Limpar opções existentes antes de adicionar novas
                $("#modelo").empty();
                $("#modelo_m").empty();
                // $("#marca").empty(); // Limpar opções de marca
                // $("#marca_m").empty(); // Limpar opções de marca

                $("#modelo").append(`<option value="">Escolher Modelo...</option>`);
                // $("#modelo_m").append(`<option value="">Escolher Modelo...</option>`);

                if ($("#marca").empty() ) {
                    $("#marca").append(`<option value="">Escolha um Modelo 〽️</option>`);
                    // $("#marca_m").append(`<option value="">Escolha um Modelo 〽️</option>`);
                }

                response.forEach(function (modelos) {
                    if (modelos) {
                        $("#modelo").append(`<option value="${modelos.id}">${modelos.nome}</option>`);
                        $("#modelo_m").append(`<option value="${modelos.id}">${modelos.nome}</option>`);
                    }

                });
     
                const modelo = await selecteService("#modelo", "#marca")
                const modelo_m = await selecteService("#modelo_m", "#marca_m")
                
            } else {
                $(".showModelos").append("<p>Criar Modelos 〽️</p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao buscar Modelos:', error);
            alert('Erro ao buscar Modelos. Por favor, tente novamente.');
        }
    });
}

// Chamar a função modelosToOption() ao carregar a página
modelosToOption();