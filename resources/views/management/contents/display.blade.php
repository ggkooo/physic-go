<div class="row col-md-12 text-white mb-2">
    <h3>Conteúdo</h3>
</div>

<div class="card border mb-4">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <div>Novo Cadastro</div>
    </div>
    <div class="card-body">
        <form id="form_layout" method="post" action="" enctype="multipart/form-data">
            <div class="row align-items-end">
                <div class="col-sm-6 mb-3">
                    <label for="nome" class="form-label fw-bold">Descrição <span>*</span></label>
                    <input type="text" class="form-control" placeholder="Informe a descrição." name="nome" id="nome"
                           value="">
                </div>

                <div class="col-sm-3 mb-3">
                    <label for="categoria" class="form-label fw-bold">Categoria </label>
                    <select class="form-select" name="categoria" id="categoria">
                        <option value="" disabled selected>Selecione...</option>
                    </select>
                </div>

                <div class="col-sm-3 mb-3">
                    <label for="situacao" class="form-label fw-bold">Situação <span>*</span></label>
                    <select class="form-select" name="situacao" id="situacao">
                        <option value="" disabled selected>Selecione...</option>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
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
        <div>Registros Cadastrados</div>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table id="table" class="table table-light table-bordered table-hover table-striped table-sm mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Data Cadastro</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Situação</th>
                    <th width="70px">Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="#" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Data Cadastro</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
