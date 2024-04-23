<body>
    <div class="quandrant">
        <div class="autoDesk">
            <form id="criarAutomovel" method="POST" enctype="multipart/form-data">
                <div>
                    <h2 class="mb-4 stickN">Cadastro de Novo Automóvel</h2>
                </div>
                <div class="mb-3">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" required>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Imagem do Automóvel</label>
                    <input type="file" class="form-control" id="img" name="img" required accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="cor" class="form-label">Cor</label>
                    <input type="text" class="form-control" id="cor" name="cor" required>
                </div>
                <div class="mb-3">
                    <label for="quilometragem" class="form-label">Quilometragem</label>
                    <input type="number" class="form-control" id="quilometragem" name="quilometragem" required>
                </div>
                <div class="mb-3">
                    <label for="ano" class="form-label">Ano</label>
                    <input type="text" class="form-control" id="ano" name="ano" required>
                </div>
                <div class="mb-3">
                    <label for="portas" class="form-label">Quantidade de Portas</label>
                    <input type="number" class="form-control" id="portas" name="portas" required>
                </div>
                <div class="mb-3">
                    <label for="combustivel" class="form-label">Tipo de Combustível</label>
                    <select class="form-control" id="combustivel" name="combustivel" required>
                        <option value="alcool">Álcool</option>
                        <option value="comun">Gasolina Comum</option>
                        <option value="disel">Diesel</option>
                        <option value="gas">Gás</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="renavam" class="form-label">RENAVAM</label>
                    <input type="text" class="form-control" id="renavam" name="renavam" required>
                </div>
                <div class="mb-3">
                    <label for="chassi" class="form-label">Chassi</label>
                    <input type="text" class="form-control" id="chassi" name="chassi" required>
                </div>
                <div class="mb-3">
                    <label for="condicao" class="form-label">Estado do Carro</label>
                    <select class="form-control" id="condicao" name="condicao" required>
                        <option value="Habilitado">Habilitado</option>
                        <option value="Desabilitado">Desabilitado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="locacao" class="form-label">Valor de Locação</label>
                    <input type="number" step="0.01" class="form-control" id="locacao" name="locacao" required>
                </div>
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <select class="form-control" id="modelo" name="modelo" required>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <select class="form-control" id="marca" name="marca" required disabled>
                        <option value="">Selecione um modelo...</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary stickB"><i class="fas fa-save"></i> Cadastrar Automóvel</button>
            </form>
        </div>
        <div class="autoDesk">
            <h2 class="mb-4 stickN">Lista Automóveis</h2>
            <div class="showAutomovis gapGlob">
            </div>
        </div>

        <div class="autoDesk">
            <h2 class="mb-4 stickN">Deletar Automóveis</h2>
            <div class="DelAutomovis gapGlob">
            </div>
        </div>

        <div class="autoDesk">
            <h2 class="mb-4 stickN">Atualizar Automóveis</h2>
            <div class="UpAutomovis gapGlob">
            </div>
        </div>



        <div class="modal fade" id="modalAutomovel" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <form id="upAutomovel" method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Atualizar Automóvel <span class="id_up"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body" style="display: flex;flex-direction:column;overflow:hidden;overflow-y:scroll;height:25rem;">
                            <div>
                                <h2 class="mb-4 stickN name_up">Automóvel</h2>
                            </div>
                            <div class="mb-3">
                                <label for="placa_m" class="form-label">Placa</label>
                                <input type="text" class="form-control" id="placa_m" name="placa_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="img_m" class="form-label">Imagem do Automóvel</label>
                                <input type="file" class="form-control" id="img_m" name="img_m" required accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="nome_m" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome_m" name="nome_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="cor_m" class="form-label">Cor</label>
                                <input type="text" class="form-control" id="cor_m" name="cor_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="quilometragem_m" class="form-label">Quilometragem</label>
                                <input type="number" class="form-control" id="quilometragem_m" name="quilometragem_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="ano_m" class="form-label">Ano</label>
                                <input type="text" class="form-control" id="ano_m" name="ano_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="portas_m" class="form-label">Quantidade de Portas</label>
                                <input type="number" class="form-control" id="portas_m" name="portas_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="combustivel_m" class="form-label">Tipo de Combustível</label>
                                <select class="form-control" id="combustivel_m" name="combustivel_m" required>
                                    <option value="alcool">Álcool</option>
                                    <option value="comun">Gasolina Comum</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="gas">Gás</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="renavam_m" class="form-label">RENAVAM</label>
                                <input type="text" class="form-control" id="renavam_m" name="renavam_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="chassi_m" class="form-label">Chassi</label>
                                <input type="text" class="form-control" id="chassi_m" name="chassi_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="locacao_m" class="form-label">Valor de Locação</label>
                                <input type="number" step="0.01" class="form-control" id="locacao_m" name="locacao_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="condicao_m" class="form-label">Estado do Carro</label>
                                <select class="form-control" id="condicao_m" name="condicao_m" required>
                                    <option value="Habilitado">Habilitado</option>
                                    <option value="Desabilitado">Desabilitado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="modelo_m" class="form-label">Modelo</label>
                                <select class="form-control" id="modelo_m" name="modelo_m" required>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="marca_m" class="form-label">Marca</label>
                                <select class="form-control" id="marca_m" name="marca_m" required disabled>
                                </select>
                            </div>
                            <input type="hidden" id="prt_id" class="prt_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary stickB upBtn"><i class="fas fa-save"></i> Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <script type="text/javascript" src="../Api/allAutomoveis/index.js"></script>
        <script type="text/javascript" src="../Api/createAutomoveis/index.js"></script>
        <script type="text/javascript" src="../Api/showAutomoveis/index.js"></script>
        <script type="text/javascript" src="../Api/deleteAutomoveis/index.js"></script>
        <script type="text/javascript" src="../Api/updateAutomoveis/index.js"></script>
</body>