<div class="d-flex flex-column align-items-center mt-5">
    <div class="col-md-10 col-10 card-questions mt-3 mb-5">
        <div class="content-questions w-100">
            <div class="col-md-12 d-flex justify-content-between">
                <div class="col-md-6">
                    <h5><strong id="nivel">Nível 1</strong></h5>
                </div>
                <div class="col-md-6 text-end">
                    <h5><strong id="pontuacao">Pontuação: 0</strong></h5>
                </div>
            </div>
            <p class="para">
                <span id="enunciado"></span>
            </p>
            <div class="col-md-12 d-flex flex-column align-items-center mb-2">
                <div class="card-alternativas p-3 mb-3 col-md-10 ">
                    <span class="ms-3" id="alternativa_a"></span>
                </div>
                <div class="card-alternativas p-3 mb-3 col-md-10">
                    <span class="ms-3" id="alternativa_b"></span>
                </div>
                <div class="card-alternativas p-3 mb-3 col-md-10">
                    <span class="ms-3" id="alternativa_c"></span>
                </div>
                <div class="card-alternativas p-3 mb-3 col-md-10">
                    <span class="ms-3" id="alternativa_d"></span>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-between">
                <div class="col-md-6">
                    <i class="bi bi-lightbulb-fill me-2" style="font-size: 35px;"></i>
                    <i class="bi bi-arrow-left-right" style="font-size: 35px;"></i>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary p-2 mt-2 px-4">Desistir</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDerrota" tabindex="-1" aria-labelledby="modalDerrotaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title d-flex align-items-center gap-2" id="modalDerrotaLabel">
          <i class="bi bi-emoji-frown" style="font-size: 2rem;"></i>
          Que pena!
        </h5>
      </div>
      <div class="modal-body text-center">
        <p class="mb-2" style="font-size: 1.2rem;">Você errou a resposta desta vez.</p>
        <p class="mb-0">Não desanime! Tente novamente e mostre seu conhecimento!</p>
      </div>
      <div class="modal-footer justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-danger btn-lg px-4" id="btnVoltarMenu">
          <i class="bi bi-arrow-left-circle me-2"></i>Voltar ao menu
        </a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalVitoria" tabindex="-1" aria-labelledby="modalVitoriaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title d-flex align-items-center gap-2" id="modalVitoriaLabel">
          <i class="bi bi-emoji-laughing" style="font-size: 2rem;"></i>
          Parabéns!
        </h5>
      </div>
      <div class="modal-body text-center">
        <p class="mb-2" style="font-size: 1.2rem;">Você respondeu todas as questões corretamente!</p>
        <p class="mb-0">Continue assim, seu conhecimento está incrível!</p>
      </div>
      <div class="modal-footer justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-success btn-lg px-4 me-2" id="btnVoltarMenuVitoria">
          <i class="bi bi-arrow-left-circle me-2"></i>Voltar ao menu
        </a>
      </div>
    </div>
  </div>
</div>
