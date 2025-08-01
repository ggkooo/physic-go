<div class="row col-md-12 text-white mb-2">
    <h3>Escolas</h3>
</div>

<div class="card border mb-4">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <div>Novo Cadastro</div>
    </div>
    <div class="card-body">
        <form id="form_layout" method="post" action="" enctype="multipart/form-data">
            <div class="row align-items-end">

                <div class="col-md-6 mb-3">
                    <label for="nome_escola" class="form-label fw-bold">Nome</label>
                    <input type="text" class="form-control" name="nome_escola" id="nome_escola">
                </div>

                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="state" class="form-label fw-bold">Estado</label>
                            <input type="hidden" id="school_state" value="">
                            <select class="form-control" id="state" name="state">
                                <option value="">Selecione o Estado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label fw-bold">Cidade</label>
                            <input type="hidden" id="school_city" value="">
                            <select class="form-control" id="city" name="city" disabled>
                                <option value="">Selecione a Cidade</option>
                            </select>
                        </div>
                    </div>
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

<script src="{{ asset('assets/js/api-states-cities.js') }}"></script>