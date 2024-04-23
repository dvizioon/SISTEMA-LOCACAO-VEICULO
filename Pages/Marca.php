<body>
    <div class="quandrant">
        <div class="autoDesk">
            <form id="criarMarca" method="POST" enctype="multipart/form-data">
                <div>
                    <h2 class="mb-4 stickN">Cadastro Nova Marca 🪼</h2>
                </div>
                <div class="mb-3">
                    <label for="nome_marca" class="form-label">Nome da Marca</label>
                    <input type="text" class="form-control" id="nome_marca" name="nome_marca" required>
                </div>
                <button type="submit" class="btn btn-primary stickB"><i class="fas fa-save"></i> Cadastrar Marca</button>
            </form>
        </div>
        <div class="autoDesk">
            <h2 class="mb-4 stickN">Lista Marcas</h2>
            <div class="showMarcas gapGlob">
            </div>
        </div>

        <div class="modal fade" id="modalMarca" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <form id="upMarcas" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div>
                            <h2 class="mb-4 stickN">Atualizar Marca 🪼 <span class="id_marca"></span></h2>
                        </div>
                        <div class="modal-body" style="display: flex;flex-direction:column;overflow:hidden;overflow-y:scroll;height:8rem;">
                            <div class="mb-3">
                                <label for="placa" class="form-label">Nome da Marca</label>
                                <input type="text" class="form-control" id="nome_marca_m" name="nome_marca_m" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary upBtnMc"><i class="fas fa-save"></i> Atualizar Marca</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../Api/ServiceMarcas/index.js"></script>
    <script type="text/javascript" src="../Api/createMarcas/index.js"></script>
</body>