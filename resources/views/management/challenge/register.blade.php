<div class="row col-md-12 text-white mb-2">
    <h3>Perguntas</h3>
</div>

<div class="card border mb-4">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <div>{{ isset($editChallenge) ? 'Editando Questão' : 'Novo Cadastro' }}</div>
    </div>
    <div class="card-body">
        <form id="form_layout" method="post" action="{{ isset($editChallenge) ? route('management.challenge.update', $editChallenge->id) : route('management.challenge.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($editChallenge))
                @method('PUT')
            @endif
            <div class="row align-items-end">

                <span class="fw-bold mb-2 mt-2">
                    <h5>ENUNCIADO</h5>
                </span>

                <div class="col-sm-12 mb-3">
                    <label for="statement" class="form-label fw-bold">Enunciado <span>*</span></label>
                    <textarea class="summernote" name="statement" id="statement" required
                        placeholder="Informe o enunciado...">{{ old('statement', isset($editChallenge) ? $editChallenge->statement : '') }}</textarea>
                </div>

                <div class="col-md-4 mb-3 align-self-start">
                    <label for="attachment_01" class="form-label fw-bold">Anexo 1</label>
                    <input type="file" class="form-control" name="attachment_01" id="attachment_01"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                    @if(isset($editChallenge) && $editChallenge->attachment_01)
                        <div class="mt-1"><a href="{{ asset('storage/' . $editChallenge->attachment_01) }}" target="_blank">Ver anexo atual</a></div>
                    @endif
                </div>

                <div class="col-md-4 mb-3 align-self-start">
                    <label for="attachment_02" class="form-label fw-bold">Anexo 2</label>
                    <input type="file" class="form-control" name="attachment_02" id="attachment_02"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                    @if(isset($editChallenge) && $editChallenge->attachment_02)
                        <div class="mt-1"><a href="{{ asset('storage/' . $editChallenge->attachment_02) }}" target="_blank">Ver anexo atual</a></div>
                    @endif
                </div>

                <div class="col-md-4 mb-3 align-self-start">
                    <label for="attachment_03" class="form-label fw-bold">Anexo 3</label>
                    <input type="file" class="form-control" name="attachment_03" id="attachment_03"
                        accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                    @if(isset($editChallenge) && $editChallenge->attachment_03)
                        <div class="mt-1"><a href="{{ asset('storage/' . $editChallenge->attachment_03) }}" target="_blank">Ver anexo atual</a></div>
                    @endif
                </div>

                <span class="fw-bold mb-2 mt-4">
                    <h5>INFORMAÇÕES</h5>
                </span>

                <div class="col-sm-12 mb-3">
                    <label for="hint" class="form-label fw-bold">Dica <span>*</span></label>
                    <textarea class="summernote" name="hint" id="hint" required
                        placeholder="Informe a dica...">{{ old('hint', isset($editChallenge) ? $editChallenge->hint : '') }}</textarea>
                </div>

                <div class="col-sm-12 d-flex flex-column mb-3">
                    <label for="source" class="form-label fw-bold">Fonte <span>*</span></label>
                    <input class="form-control" name="source" id="source" required placeholder="Informe a fonte..." value="{{ old('source', isset($editChallenge) ? $editChallenge->source : '') }}">
                </div>

                <span class="fw-bold mb-2 mt-4">
                    <h5>ALTERNATIVAS</h5>
                </span>

                <div class="col-md-12">
                    <div class="col-sm-4 mb-3">
                        <label for="correct_alternative" class="form-label fw-bold">
                            Alternativa Correta <span>*</span>
                        </label>
                        <select class="form-select" name="correct_alternative" id="correct_alternative" required>
                            <option value="">Selecione uma opção</option>
                            <option value="a" {{ old('correct_alternative', isset($editChallenge) ? $editChallenge->correct_alternative : '') == 'a' ? 'selected' : '' }}>Alternativa A</option>
                            <option value="b" {{ old('correct_alternative', isset($editChallenge) ? $editChallenge->correct_alternative : '') == 'b' ? 'selected' : '' }}>Alternativa B</option>
                            <option value="c" {{ old('correct_alternative', isset($editChallenge) ? $editChallenge->correct_alternative : '') == 'c' ? 'selected' : '' }}>Alternativa C</option>
                            <option value="d" {{ old('correct_alternative', isset($editChallenge) ? $editChallenge->correct_alternative : '') == 'd' ? 'selected' : '' }}>Alternativa D</option>
                            <option value="e" {{ old('correct_alternative', isset($editChallenge) ? $editChallenge->correct_alternative : '') == 'e' ? 'selected' : '' }}>Alternativa E</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="alternative_a" class="form-label fw-bold">Alternativa A </label>
                    <input class="form-control" name="alternative_a" id="alternative_a" required
                        placeholder="Alternativa A" value="{{ old('alternative_a', isset($editChallenge) ? $editChallenge->alternative_a : '') }}">
                </div>
                <div class="col-sm-8 mb-3">
                    <label for="alternative_b" class="form-label fw-bold">Alternativa B </label>
                    <input class="form-control" name="alternative_b" id="alternative_b" required
                        placeholder="Alternativa B" value="{{ old('alternative_b', isset($editChallenge) ? $editChallenge->alternative_b : '') }}">
                </div>
                <div class="col-sm-8 mb-3">
                    <label for="alternative_c" class="form-label fw-bold">Alternativa C </label>
                    <input class="form-control" name="alternative_c" id="alternative_c" required
                        placeholder="Alternativa C" value="{{ old('alternative_c', isset($editChallenge) ? $editChallenge->alternative_c : '') }}">
                </div>
                <div class="col-sm-8 mb-3">
                    <label for="alternative_d" class="form-label fw-bold">Alternativa D </label>
                    <input class="form-control" name="alternative_d" id="alternative_d" required
                        placeholder="Alternativa D" value="{{ old('alternative_d', isset($editChallenge) ? $editChallenge->alternative_d : '') }}">
                </div>
                <div class="col-sm-8 mb-3">
                    <label for="alternative_e" class="form-label fw-bold">Alternativa E </label>
                    <input class="form-control" name="alternative_e" id="alternative_e" required
                        placeholder="Alternativa E" value="{{ old('alternative_e', isset($editChallenge) ? $editChallenge->alternative_e : '') }}">
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
