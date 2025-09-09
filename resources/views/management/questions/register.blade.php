<div class="row col-md-12 text-white mb-2">
    <h3>Perguntas</h3>
</div>

<div class="card border mb-4">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <div>{{ isset($editQuestion) ? 'Editar Pergunta' : 'Novo Cadastro' }}</div>
    </div>
    <div class="card-body">
        <form id="form_layout" method="post" action="{{ isset($editQuestion) ? url('/management/questions/update/' . $editQuestion->id) : route('management.questions.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($editQuestion))
                @method('PUT')
            @endif
            <div class="row align-items-end">

                <span class="fw-bold mb-2 mt-2">
                    <h5>INFORMAÇÕES</h5>
                </span>

                <div class="col-sm-4 mb-3">
                    <label for="grade" class="form-label fw-bold">Série <span>*</span></label>
                    <select class="form-select" name="grade" id="grade" required>
                        <option selected disabled>Selecione uma série...</option>
                        <option value="1" {{ (isset($editQuestion) && $editQuestion->grade == '1') ? 'selected' : '' }}>Test</option>
                    </select>
                </div>

                <div class="col-sm-4 mb-3">
                    <label for="content" class="form-label fw-bold">Conteúdo <span>*</span></label>
                    <select class="form-select" name="content" id="content" required>
                        <option selected disabled>Selecione um conteúdo...</option>
                        <option value="2" {{ (isset($editQuestion) && $editQuestion->content == '2') ? 'selected' : '' }}>Test2</option>
                    </select>
                </div>

                <div class="col-sm-4 mb-3">
                    <label for="source" class="form-label fw-bold">Fonte <span>*</span></label>
                    <input class="form-control" name="source" id="source" required placeholder="Coloque a fonte da questão..." value="{{ isset($editQuestion) ? $editQuestion->source : '' }}">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="tip" class="form-label fw-bold">Dica <span>*</span></label>
                    <textarea class="summernote" name="tip" id="tip" required placeholder="Coloque a dica da questão...">{{ isset($editQuestion) ? $editQuestion->tip : old('tip') }}</textarea>
                </div>

                <div class="col-md-6 mb-3 align-self-start">
                    <label for="tip_attachment" class="form-label fw-bold">Arquivo da dica</label>
                    <input type="file" class="form-control" name="tip_attachment" id="tip_attachment" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>


                <span class="fw-bold mb-2 mt-4">
                    <h5>ENUNCIADO</h5>
                </span>

                <div class="col-sm-12 mb-3">
                    <label for="statement" class="form-label fw-bold">Enunciado <span>*</span></label>
                    <textarea class="summernote" name="statement" id="statement" required placeholder="Coloque o enunciado da questão...">{{ isset($editQuestion) ? $editQuestion->statement : old('statement') }}</textarea>
                </div>

                <div class="col-md-4 mb-3 align-self-start">
                    <label for="statement_attachment1" class="form-label fw-bold">Arquivo 1</label>
                    <input type="file" class="form-control" name="statement_attachment1" id="statement_attachment1" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-md-4 mb-3 align-self-start">
                    <label for="statement_attachment2" class="form-label fw-bold">Arquivo 2</label>
                    <input type="file" class="form-control" name="statement_attachment2" id="statement_attachment2" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-md-4 mb-3 align-self-start">
                    <label for="statement_attachment3" class="form-label fw-bold">Arquivo 3</label>
                    <input type="file" class="form-control" name="statement_attachment3" id="statement_attachment3" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>


                <span class="fw-bold mb-2 mt-4">
                    <h5>OPÇÕES</h5>
                </span>

                <div class="col-md-12">
                    <div class="col-sm-4 mb-3">
                        <label for="correct_option" class="form-label fw-bold">Opção correta <span>*</span></label>
                        <select class="form-select" name="correct_option" id="correct_option" required>
                            <option disabled {{ !isset($editQuestion) ? 'selected' : '' }}>Selecione uma opção</option>
                            <option value="a" {{ (isset($editQuestion) && $editQuestion->correct_option == 'a') ? 'selected' : '' }}>A</option>
                            <option value="b" {{ (isset($editQuestion) && $editQuestion->correct_option == 'b') ? 'selected' : '' }}>B</option>
                            <option value="c" {{ (isset($editQuestion) && $editQuestion->correct_option == 'c') ? 'selected' : '' }}>C</option>
                            <option value="d" {{ (isset($editQuestion) && $editQuestion->correct_option == 'd') ? 'selected' : '' }}>D</option>
                            <option value="e" {{ (isset($editQuestion) && $editQuestion->correct_option == 'e') ? 'selected' : '' }}>E</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="option_a" class="form-label fw-bold">Opção A </label>
                    <input class="form-control" name="option_a" id="option_a" required placeholder="Option A" value="{{ isset($editQuestion) ? $editQuestion->option_a : '' }}">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="option_a_attachment" class="form-label fw-bold">Arquivo A</label>
                    <input type="file" class="form-control" name="option_a_attachment" id="option_a_attachment" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="option_b" class="form-label fw-bold">Opção B </label>
                    <input class="form-control" name="option_b" id="option_b" required placeholder="Option B" value="{{ isset($editQuestion) ? $editQuestion->option_b : '' }}">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="option_b_attachment" class="form-label fw-bold">Arquivo B</label>
                    <input type="file" class="form-control" name="option_b_attachment" id="option_b_attachment" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="option_c" class="form-label fw-bold">Opção C </label>
                    <input class="form-control" name="option_c" id="option_c" required placeholder="Option C" value="{{ isset($editQuestion) ? $editQuestion->option_c : '' }}">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="option_c_attachment" class="form-label fw-bold">Arquivo C</label>
                    <input type="file" class="form-control" name="option_c_attachment" id="option_c_attachment" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="option_d" class="form-label fw-bold">Opção D </label>
                    <input class="form-control" name="option_d" id="option_d" required placeholder="Option D" value="{{ isset($editQuestion) ? $editQuestion->option_d : '' }}">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="option_d_attachment" class="form-label fw-bold">Arquivo D</label>
                    <input type="file" class="form-control" name="option_d_attachment" id="option_d_attachment" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

                <div class="col-sm-8 mb-3">
                    <label for="option_e" class="form-label fw-bold">Opção E </label>
                    <input class="form-control" name="option_e" id="option_e" required placeholder="Option E" value="{{ isset($editQuestion) ? $editQuestion->option_e : '' }}">
                </div>
                <div class="col-md-4 mb-3 align-self-start">
                    <label for="option_e_attachment" class="form-label fw-bold">Arquivo E</label>
                    <input type="file" class="form-control" name="option_e_attachment" id="option_e_attachment" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                </div>

            </div>
    </div>

    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <button type="submit" name="btn" value="save" id="btnSave" class="btn btn-danger">{{ isset($editQuestion) ? 'Salvar Alterações' : 'Salvar' }}</button>
        </div>
    </div>
    </form>
</div>