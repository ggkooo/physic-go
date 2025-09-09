<div class="d-flex flex-column align-items-center mt-5">
    <div class="col-md-10 col-10 card-questions mt-3 mb-5">
        <div class="content-questions w-100">
            <div class="col-md-12 d-flex justify-content-between mb-3">
                <div class="col-auto">
                    <div class="bg-danger text-white rounded px-3 py-1 text-center" style="font-size: 1rem;">
                        Série: {{ $question->grade }}
                    </div>
                </div>
                <div class="col-auto">
                    <div class="bg-danger text-white rounded px-3 py-1 text-center" style="font-size: 1rem;">
                        Conteúdo: {{ $question->content }}
                    </div>
                </div>
            </div>
            <p class="para mt-4" style="font-size: 1.2rem; color: #fff;">
                <span>{!! str_replace('<p', '<p style="color:#fff"', $question->statement) !!}</span>
            </p>
            <div class="col-md-12 d-flex flex-column align-items-center mb-2">
                <div class="card-alternativas p-3 mb-3 col-md-10 ">
                    <span class="ms-3 text-white">A) {{ $question->option_a }}</span>
                </div>
                <div class="card-alternativas p-3 mb-3 col-md-10">
                    <span class="ms-3 text-white">B) {{ $question->option_b }}</span>
                </div>
                <div class="card-alternativas p-3 mb-3 col-md-10">
                    <span class="ms-3 text-white">C) {{ $question->option_c }}</span>
                </div>
                <div class="card-alternativas p-3 mb-3 col-md-10">
                    <span class="ms-3 text-white">D) {{ $question->option_d }}</span>
                </div>
                @if(!empty($question->option_e))
                <div class="card-alternativas p-3 mb-3 col-md-10">
                    <span class="ms-3 text-white">E) {{ $question->option_e }}</span>
                </div>
                @endif
            </div>
            <div class="col-md-12 d-flex justify-content-between mt-4">
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
