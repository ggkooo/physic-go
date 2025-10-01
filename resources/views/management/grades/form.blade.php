<div class="row col-md-12 text-white mb-2">
    <h3>Séries</h3>
</div>

<div class="card border mb-4">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <div>Novo Cadastro</div>
    </div>
    <div class="card-body">
        <form id="form_layout" method="post"
            action="@if($type == 'register'){{ route('management.grades.store') }}@elseif($type == 'edit'){{ route('management.grades.update', $grade->id ?? '') }}@endif"
            enctype="multipart/form-data">
            @csrf
            @if($type == 'edit')
                @method('PUT')
            @endif
            <div class="row align-items-end">
                <div class="col-sm-9 mb-3">
                    <label for="name" class="form-label fw-bold">Nome <span>*</span></label>
                    <input type="text" class="form-control" placeholder="Informe a descrição." name="name" id="name"
                        value="{{ old('name', $grade->name ?? '') }}">
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="status" class="form-label fw-bold">Situação <span>*</span></label>
                    <select class="form-select" name="status" id="status">
                        <option value="" disabled selected>Selecione...</option>
                        <option value="active" @if(old('status', $grade->status ?? '') == 'active') selected @endif>Ativo
                        </option>
                        <option value="inactive" @if(old('status', $grade->status ?? '') == 'inactive') selected @endif>
                            Inativo</option>
                    </select>
                </div>
            </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <button type="submit" name="btn" value="salvar" id="btnSalvar" class="btn btn-danger">
                @if($type == 'register') Cadastrar nova série @elseif($type == 'edit') Editar série @endif
            </button>
        </div>
    </div>
    </form>
</div>