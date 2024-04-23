<body>
    <div class="quandrant">
        <div class="autoDesk">
            <form id="criarModelo" method="POST" enctype="multipart/form-data">
                <div>
                    <h2 class="mb-4 stickN">Cadastro Novo Modelo 〽️</h2>
                </div>
                <div class="mb-3">
                    <label for="placa" class="form-label">Nome do Modelo</label>
                    <input type="text" class="form-control" id="nome_modelo" name="nome_modelo" required>
                </div>
                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <select class="form-control" id="marca_id" name="marca_id" required>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="placa" class="form-label">Descrição do Modelo</label>
                    <textarea class="form-control" name="descricao_modelo" id="descricao_modelo" cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary stickB"><i class="fas fa-save"></i> Cadastrar Modelo</button>
            </form>
        </div>
        <div class="autoDesk">
            <h2 class="mb-4 stickN">Lista Modelos</h2>
            <div class="showModelos gapGlob">
            </div>
        </div>

        <div class="modal fade" id="modalModelo" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <form id="upModelo" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div>
                            <h2 class="mb-4 stickN">Atualizar Modelo 〽️ <span class="id_modelo"></span></h2>
                        </div>
                        <div class="modal-body" style="display: flex;flex-direction:column;overflow:hidden;overflow-y:scroll;height:25rem;">
                            <div class="mb-3">
                                <label for="placa" class="form-label">Nome do Modelo</label>
                                <input type="text" class="form-control" id="nome_modelo_m" name="nome_modelo_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca</label>
                                <select class="form-control" id="marca_id_m" name="marca_id_m" required>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="placa" class="form-label">Descrição do Modelo</label>
                                <textarea class="form-control" name="descricao_modelo_m" id="descricao_modelo_m" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary upBtnMd"><i class="fas fa-save"></i> Atualizar Modelo</button>
                        </div>
                </form>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="../Api/allModelos/index.js"></script>
    <script type="text/javascript" src="../Api/ServiceModelos/index.js"></script>
    <script type="text/javascript" src="../Api/createModelos/index.js"></script>
</body>