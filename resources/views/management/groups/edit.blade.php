@php($editing = isset($editGroup))
<div class="row col-md-12 text-white mb-2">
    <h3>{{ $editing ? 'Editar' : 'Cadastrar' }} grupo</h3>
</div>

<div class="card border mb-4">
    <form method="POST"
        action="{{ $editing ? route('management.groups.update', $editGroup->id) : route('management.groups.store') }}">
        @csrf
        @if($editing) @method('PUT') @endif
        <div class="card-body row">
            <div class="col-md-5 mb-3">
                <label for="name" class="form-label fw-bold">Identificador *</label>
                <input class="form-control" id="name" name="name" required placeholder="Ex.: gestao_grupos"
                    value="{{ old('name', $editGroup->name ?? '') }}">
                <small class="text-muted">Use letras, números, hífen ou sublinhado, sem espaços.</small>
            </div>
            <div class="col-md-7 mb-3">
                <label for="description" class="form-label fw-bold">Descrição</label>
                <input class="form-control" id="description" name="description"
                    placeholder="Ex.: Gestão de Recursos Humanos"
                    value="{{ old('description', $editGroup->description ?? '') }}">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('management.groups') }}" class="btn btn-secondary">Voltar</a>
            <button class="btn btn-danger" type="submit">Salvar</button>
        </div>
    </form>
</div>