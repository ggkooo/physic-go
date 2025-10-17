<div class="d-flex flex-column align-items-center mt-4">

    <div class="col-10 col-md-3 mb-4 position-relative">
        <a href="{{ route('challenge.display') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise position-relative"
            aria-describedby="novo-desc-tematico">
            DESAFIO TEMÁTICO
            <span class="badge-new" role="note" id="novo-desc-tematico" aria-label="Recurso novo">
                Novo
            </span>
        </a>
    </div>

    <div class="col-10 col-md-3 mb-4">
        <a href="{{ route('game.menu') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise disabled">JOGAR</a>
    </div>
    <div class="col-10 col-md-3 mb-4">
        <a href="{{ route('study') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise disabled">ESTUDAR</a>
    </div>
    <div class="col-10 col-md-3 mb-4">
        <a href="{{ route('config.account') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise disabled">CONFIGURAR</a>
    </div>
    <div class="col-10 col-md-3 mb-4">
        <a href="{{ route('credits') }}"><button
                class="btn btn-danger w-100 p-3 btn-default btn-raise">CRÉDITOS</button></a>
    </div>
    <div class="col-10 col-md-3 mb-4">
        <a href="{{ route('contact') }}"><button
                class="btn btn-danger w-100 p-3 btn-default btn-raise">CONTATO</button></a>
    </div>
    <div class="row">
        <a href="{{ route('logout') }}"
            class="btn-exit text-decoration-none text-white w-100 p-2 position-relative d-inline-block overflow-hidden mt-3">
            <i class="bi bi-box-arrow-left icon" style="font-size: 25px;"></i>
            <span class="exit-text" style="font-size: 18px;">Sair</span>
        </a>
    </div>
</div>
