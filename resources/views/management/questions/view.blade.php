<div class="d-flex flex-column align-items-center mt-5">
    <div class="col-md-10 col-12 card-questions mt-3 mb-5 p-4 shadow-lg rounded">
        <div class="content-questions w-100">

            <!-- Cabeçalho da questão -->
            <div class="row mb-4">
                <div class="col-md-6 mb-2 mb-md-0">
                    <div class="badge bg-danger w-100 py-2 fs-6">
                        Série: {{ $question->grade }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="badge bg-danger w-100 py-2 fs-6">
                        Conteúdo: {{ $question->content }}
                    </div>
                </div>
            </div>

            <!-- Enunciado -->
            <p class="statement text-white fs-5 mt-3">
                {!! str_replace('<p', '<p style="color:#fff"', $question->statement) !!}
            </p>

            <!-- Alternativas -->
            <div class="alternativas mt-4">
                <div class="card-alternativas p-3 mb-3">
                    <span class="text-white">A) {{ $question->option_a }}</span>
                </div>
                <div class="card-alternativas p-3 mb-3">
                    <span class="text-white">B) {{ $question->option_b }}</span>
                </div>
                <div class="card-alternativas p-3 mb-3">
                    <span class="text-white">C) {{ $question->option_c }}</span>
                </div>
                <div class="card-alternativas p-3 mb-3">
                    <span class="text-white">D) {{ $question->option_d }}</span>
                </div>
                @if(!empty($question->option_e))
                <div class="card-alternativas p-3 mb-3">
                    <span class="text-white">E) {{ $question->option_e }}</span>
                </div>
                @endif
            </div>

            <!-- Rodapé -->
            <div class="row mt-4 align-items-center">
                <div class="col-md-6 text-white">
                    <span class="fw-bold">Fonte:</span> {{ $question->source }}
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('management.questions') }}" class="btn btn-danger px-4">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
