<div class="row col-md-12 text-white mb-2">
    <h3>Perguntas</h3>
</div>

<div class="card border mb-4">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <div>Novo Cadastro</div>
    </div>
    <div class="card-body">
        <form id="form_layout" method="post" action="" enctype="multipart/form-data">
            <div class="row align-items-end">

                <span class="fw-bold mb-2 mt-2">
                    <h5>INFORMAÇÕES</h5>
                </span>

                <div class="col-sm-4 mb-3">
                    <label for="nivel" class="form-label fw-bold">Nível <span>*</span></label>
                    <select class="form-select" name="nivel" id="nivel" required>
                        <option value="">Selecione o nível...</option>
                    </select>
                </div>

                <div class="col-sm-4 mb-3">
                    <label for="conteudo" class="form-label fw-bold">Conteúdo <span>*</span></label>
                    <select class="form-select" name="conteudo" id="conteudo" required>
                        <option value="">Selecione o conteúdo...</option>
                    </select>
                </div>

                <div class="col-sm-4 mb-3">
                    <label for="fonte" class="form-label fw-bold">Fonte <span>*</span></label>
                    <input class="form-control" name="fonte" id="fonte" required placeholder="Informe a fonte...">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="dica" class="form-label fw-bold">Dica <span>*</span></label>
                    <input class="summernote" name="dica" id="dica" required placeholder="Informe a dica...">
                </div>

                <div class="col-md-6 mb-3 align-self-start">
                    <label for="arquivo_dica" class="form-label fw-bold">Anexo</label>
                    <input type="file" class="form-control" name="arquivo_dica" id="arquivo_dica"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>


                <span class="fw-bold mb-2 mt-4">
                    <h5>ENUNCIADO</h5>
                </span>

                <div class="col-sm-12 mb-3">
                    <label for="enunciado" class="form-label fw-bold">Enunciado <span>*</span></label>
                    <input class="summernote" name="enunciado" id="enunciado" required
                        placeholder="Informe o enunciado...">
                </div>

                <div class="col-md-4 mb-3 align-self-start">
                    <label for="arquivo_enunciado_um" class="form-label fw-bold">Anexo 1</label>
                    <input type="file" class="form-control" name="arquivo_enunciado_um" id="arquivo_enunciado_um"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-md-4 mb-3 align-self-start">
                    <label for="arquivo_enunciado_dois" class="form-label fw-bold">Anexo 2</label>
                    <input type="file" class="form-control" name="arquivo_enunciado_dois" id="arquivo_enunciado_dois"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-md-4 mb-3 align-self-start">
                    <label for="arquivo_enunciado_tres" class="form-label fw-bold">Anexo 3</label>
                    <input type="file" class="form-control" name="arquivo_enunciado_tres" id="arquivo_enunciado_tres"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>


                <span class="fw-bold mb-2 mt-4">
                    <h5>ALTERNATIVAS</h5>
                </span>

                <div class="col-md-12">
                    <div class="col-sm-4 mb-3">
                        <label for="alternativa_correta" class="form-label fw-bold">Alternativa Correta
                            <span>*</span></label>
                        <select class="form-select" name="alternativa_correta" id="alternativa_correta" required>
                            <option value="">Selecione uma opção</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="alternativa_a" class="form-label fw-bold">Alternativa A </label>
                    <input class="form-control" name="alternativa_a" id="alternativa_a" required
                        placeholder="Alternativa A">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="anexo_a" class="form-label fw-bold">Anexo A</label>
                    <input type="file" class="form-control" name="anexo_a" id="anexo_a"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="alternativa_b" class="form-label fw-bold">Alternativa B </label>
                    <input class="form-control" name="alternativa_b" id="alternativa_b" required
                        placeholder="Alternativa B">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="anexo_b" class="form-label fw-bold">Anexo B</label>
                    <input type="file" class="form-control" name="anexo_b" id="anexo_b"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="alternativa_c" class="form-label fw-bold">Alternativa C </label>
                    <input class="form-control" name="alternativa_c" id="alternativa_c" required
                        placeholder="Alternativa C">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="anexo_c" class="form-label fw-bold">Anexo C</label>
                    <input type="file" class="form-control" name="anexo_c" id="anexo_c"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="alternativa_d" class="form-label fw-bold">Alternativa D </label>
                    <input class="form-control" name="alternativa_d" id="alternativa_d" required
                        placeholder="Alternativa D">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="anexo_d" class="form-label fw-bold">Anexo D</label>
                    <input type="file" class="form-control" name="anexo_d" id="anexo_d"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="alternativa_e" class="form-label fw-bold">Alternativa E </label>
                    <input class="form-control" name="alternativa_e" id="alternativa_e" required
                        placeholder="Alternativa E">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="anexo_e" class="form-label fw-bold">Anexo E</label>
                    <input type="file" class="form-control" name="anexo_e" id="anexo_e"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

            </div>
    </div>

    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <button type="submit" name="btn" value="salvar" id="btnSalvar" class="btn btn-danger">Salvar</button>
        </div>
    </div>
    </form>
</div>