<div class="row col-md-12 text-white mb-2">
    <h3>Publicações</h3>
</div>

<div class="card border mb-4">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <div>Novo Cadastro</div>
    </div>
    <div class="card-body">
        <form id="form_layout" method="post" action="" enctype="multipart/form-data">
            <div class="row align-items-end">
                <div class="col-sm-9 mb-3">
                    <label for="nome" class="form-label fw-bold">Descrição <span>*</span></label>
                    <input type="text" class="form-control" placeholder="Informe a descrição."
                        name="nome" id="nome" value="">
                </div>

                <div class="col-sm-3 mb-3">
                    <label for="situacao" class="form-label fw-bold">Situação <span>*</span></label>
                    <select class="form-select" name="situacao" id="situacao" required>
                        <option value="" disabled selected>Selecione...</option>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                
                <div class="col-sm-9 mb-3">
                    <label for="arquivo_pdf" class="form-label fw-bold">PDF <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="arquivo_pdf" id="arquivo_pdf" accept=".pdf" required>
                    <div class="form-text">Apenas arquivos .pdf são permitidos.</div>
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



<div class="card border">
    <div class="card-header fw-bold d-flex justify-content-between">
        <div>Publicações Cadastradas</div>
        <!-- <div><a href="#" class="btn btn-sm btn-dark">Novo Cadastro</a></div> -->
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table id="table" class="table table-light table-bordered table-hover table-striped table-sm mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Data Cadastro</th>
                        <th>Descrição</th>
                        <th>Situação</th>
                        <th width="70px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>16/07/2025 14:32</td>
                        <td>Descrição do primeiro item</td>
                        <td>
                            <span class="badge bg-success text-light">Ativo</span>
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="#">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>15/07/2025 10:15</td>
                        <td>Segunda descrição fictícia</td>
                        <td>
                            <span class="badge bg-warning text-light">Pendente</span>
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="#">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>14/07/2025 09:00</td>
                        <td>Outro exemplo de descrição</td>
                        <td>
                            <span class="badge bg-danger text-light">Inativo</span>
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="#">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>13/07/2025 18:45</td>
                        <td>Mais uma descrição aqui</td>
                        <td>
                            <span class="badge bg-success text-light">Ativo</span>
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="#">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Data Cadastro</th>
                        <th>Descrição</th>
                        <th>Situação</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>