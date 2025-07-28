<div class="row col-md-12 text-white mb-2">
    <h3>Usuários</h3>
</div>

<div class="card border mb-4">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <div>Cadastro</div>
    </div>
    <div class="card-body">
        <form id="form_layout" method="post" action="" enctype="multipart/form-data">
            <div class="row align-items-end">

                <div class="col-sm-6 mb-3">
                    <label for="nome" class="form-label fw-bold">Nome <span>*</span></label>
                    <input class="form-control" name="nome" id="nome" required placeholder="Informe o nome...">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="email" class="form-label fw-bold">Email <span>*</span></label>
                    <input class="form-control" name="email" id="email" required placeholder="Informe o email...">
                </div>

                <div class="col-sm-3 mb-3">
                    <label for="cpf" class="form-label fw-bold">CPF <span>*</span></label>
                    <input type="text" class="form-control cpf-mask" id="cpf" name="cpf" placeholder="Ex: 123.456.789-10" value="">
                </div>

                <div class="col-sm-3 mb-3">
                    <label for="telefone" class="form-label fw-bold">Telefone <span>*</span></label>
                    <input type="text" class="form-control telefone-mask" name="telefone" id="telefone"
                        placeholder="Ex: (99) 99999-9999">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="cargo" class="form-label fw-bold">Cargo <span>*</span></label>
                    <select class="form-select" name="cargo" id="cargo" required>
                        <option value="">Selecione o cargo...</option>
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

<script>

    // MÁSCARA PARA TELEFONES
    $(document).on('input', '.telefone-mask', function () {
        let numero = $(this).val().replace(/\D/g, '');

        if (numero.length > 11) {
            numero = numero.slice(0, 11);
        }

        if (numero.length <= 10) {
            numero = numero.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
        } else {
            numero = numero.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
        }

        $(this).val(numero.trim());
    });


    // MÁSCARA PARA CPF
    $(document).on('input', '.cpf-mask', function () {
        let cpf = $(this).val().replace(/\D/g, '');

        if (cpf.length > 11) {
            cpf = cpf.slice(0, 11);
        }

        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

        $(this).val(cpf);
    });

</script>