<?php

require_once('../middleware/Antecedentes.php');
?>

<body>
    <div class="quandrant">
        <div class="autoDesk">
            <form id="criarCliente" method="POST">
                <div>
                    <h2 class="mb-4 stickN">Cadastro de Novo Cliente</h2>
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
                <div class="mb-3">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" required>
                </div>
                <div class="mb-3">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="pai" class="form-label">Pai</label>
                    <input type="text" class="form-control" id="pai" name="pai" required>
                </div>
                <div class="mb-3">
                    <label for="mae" class="form-label">Mãe</label>
                    <input type="text" class="form-control" id="mae" name="mae" required>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Pesquise os Antecedentes...</label>
                    <?php
                    openPopupWithIframe($url);
                    ?>
                </div>

                <div class="mb-3">
                    <label for="antecedents" class="form-label">Antecedentes</label>
                    <textarea class="form-control" id="antecedents" name="antecedents" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary stickB"><i class="fas fa-save"></i> Cadastrar Cliente</button>
            </form>
        </div>

        <div class="autoDesk">
            <h2 class="mb-4 stickN">Lista de Clientes</h2>
            <div class="showClientes gapGlob">
            </div>
        </div>

        <div class="autoDesk">
            <h2 class="mb-4 stickN">Enviar Email Para:</h2>
            <div class="showClientesEmail gapGlob">
            </div>
        </div>

        <div class="autoDesk">
            <h2 class="mb-4 stickN">Sistema Anti-Roubo:</h2>
            <div class="showClientesAntiroubo gapGlob">
            </div>
        </div>



        <div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <form id="sendEmail" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="mb-4 stickN">Atualizar Cliente <span class="id_cliente"></span></h2>
                        </div>
                        <div class="modal-body" style="display: flex;flex-direction:column;overflow:hidden;overflow-y:scroll;height:25rem;">
                            <div class="mb-3">
                                <label for="nome_m" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome_m" name="nome_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="cpf_m" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf_m" name="cpf_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="rg_m" class="form-label">RG</label>
                                <input type="text" class="form-control" id="rg_m" name="rg_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="numero_m" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numero_m" name="numero_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="email_m" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email_m" name="email_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="pai_m" class="form-label">Pai</label>
                                <input type="text" class="form-control" id="pai_m" name="pai_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="mae_m" class="form-label">Mãe</label>
                                <input type="text" class="form-control" id="mae_m" name="mae_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="antecedents_m" class="form-label">Antecedentes</label>
                                <textarea class="form-control" id="antecedents_m" name="antecedents_m" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary upBtnCl"><i class="fas fa-save"></i> Atualizar Cliente</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="modal fade" id="modalClienteEmail" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <form id="upCliente" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="mb-4 stickN">Enviar Email <span class="id_cliente_email"></span></h2>
                        </div>

                        <div class="modal-body" style="display: flex;flex-direction:column;overflow:hidden;overflow-y:scroll;height:25rem;">

                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Usar Aviso ⚠️
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body collapseOne-body">
                                            <form id="sendEmail_template" method="POST">
                                                <div class="d-flex">
                                                    <input type="email" class="form-control m-2" id="send_email_m_template" name="send_email_m_template" required>
                                                    <button type="button" class="btn btn-primary upBtnSendAviso_template m-2">Enviar Aviso</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Criar Aviso 🎯
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body collapseTwo-body">
                                            <form id="sendEmail" method="POST">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="mb-4 stickN">Aviso 👽 <span class="id_cliente_email"></span></h2>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="send_email_m" class="form-label">Enviar Para:[To] &rArr; [2525/TLS]</label>
                                                            <input type="email" class="form-control" id="send_email_m" name="send_email_m" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Aviso Personalizado...</label>
                                                            <textarea id="template_m" class="form-control template_m"></textarea></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary upBtnSendAviso">Enviar Aviso</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Importando os scripts JavaScript -->
    <script type="text/javascript" src="../Api/ServiceClientes/index.js"></script>
    <script type="text/javascript" src="../Api/createClientes/index.js"></script>
</body>