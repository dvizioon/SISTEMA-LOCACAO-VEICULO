<body>
    <div class="containerProtocol">
        <h1>Protocolos</h1>
        <div class="showProtocolos" id="showProtocolos">

        </div>
    </div>

    <div class="modal fade" id="modalProtocol" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <form id="upProtocol" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Atualizar Protocolo <span class="id_protocol"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body" style="display: flex;flex-direction:column;overflow:hidden;overflow-y:scroll;height:25rem;">
                        <div class="mb-3">
                            <label for="protocolo_name" class="form-label">Protocolo:</label>
                            <input type="text" class="form-control" id="protocolo_name" name="protocolo_name" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="locacao_m" class="form-label">Locação:</label>
                            <input type="text" class="form-control" id="locacao_m" name="locacao_m" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="protocolo_m" class="form-label">Deseja Resolver o Protocolo? </label>
                            <select class="form-control" id="protocolo_m" name="protocolo_m" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary stickB upBtnPtc"><i class="fas fa-save"></i> Atualizar Protocolo</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <script src="../Api/ServiceProtocol/index.js"></script>
</body>