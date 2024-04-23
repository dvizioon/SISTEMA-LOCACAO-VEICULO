<body>
    <div class="quandrant">
        <div class="autoDesk">
            <form id="criarLocacao" method="POST">
                <div>
                    <h2 class="mb-4 stickN">Cadastro de Nova Alocação</h2>
                </div>
                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Cliente</label>
                    <select class="form-control" id="cliente_id" name="cliente_id" required>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="carro_id" class="form-label">Carro</label>
                    <select class="form-control" id="carro_id" name="carro_id" required>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="data_hora_locacao" class="form-label">Data e Hora de Locação</label>
                    <input type="datetime-local" class="form-control" id="data_hora_locacao" name="data_hora_locacao" required>
                </div>
                <div class="mb-3">
                    <label for="data_hora_devolucao" class="form-label">Data e Hora de Devolução</label>
                    <input type="datetime-local" class="form-control" id="data_hora_devolucao" name="data_hora_devolucao" required>
                </div>
                <button type="submit" class="btn btn-primary stickB"><i class="fas fa-save"></i> Criar Locação</button>
            </form>
        </div>

        <div class="autoDesk">
            <h2 class="mb-4 stickN">Locações Feitas</h2>
            <div class="showLocacao gapGlob">
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalLocacao" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <form id="upCliente" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="mb-4 stickN">Atualizar Locação <span class="id_locacao"></span></h2>
                    </div>
                    <div class="modal-body" style="display: flex;flex-direction:column;overflow:hidden;overflow-y:scroll;height:25rem;">
                        <div class="mb-3">
                            <label for="cliente_id_m" class="form-label">Cliente</label>
                            <select class="form-control" id="cliente_id_m" name="cliente_id_m" required>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="carro_id_m" class="form-label">Carro</label>
                            <select class="form-control" id="carro_id_m" name="carro_id_m" required>
                            </select>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="protocol_uuid4" class="form-label">Protocolo</label> -->
                            <input type="hidden" class="form-control " id="protocol_uuid4" name="protocol_uuid4" disabled >
                            <!-- <button type="button" class="btn btn-secondary mt-3" onclick="gerarUUID()">
                                📌Gerar UUID
                            </button> -->
                        </div>
                        <div class="mb-3">
                            <label for="data_hora_locacao_m" class="form-label">Data e Hora de Locação</label>
                            <input type="datetime-local" class="form-control" id="data_hora_locacao_m" name="data_hora_locacao_m" required>
                        </div>
                        <div class="mb-3">
                            <label for="data_hora_devolucao_m" class="form-label">Data e Hora de Devolução</label>
                            <input type="datetime-local" class="form-control" id="data_hora_devolucao_m" name="data_hora_devolucao_m" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary upBtnLc"><i class="fas fa-save"></i> Atualizar Dados</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function gerarUUID() {
            const uuid = uuidv4();
            $("#protocol_uuid4").val(uuid)
        }
    </script>

    <script type="text/javascript" src="../Api/createProtocol/index.js"></script>
    <script type="text/javascript" src="../Api/ServiceLocacao/index.js"></script>
    <script type="text/javascript" src="../Api/createLocacao/index.js"></script>
</body>