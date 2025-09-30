<div class="d-flex flex-column align-items-center mt-5">
    <div class="mt-4"></div>

    <div class="col-md-8 col-11 position-relative mb-4">

        <div class="ranking-banner">
            <img src="{{ asset('assets/img/banner.png') }}" alt="Banner Ranking" class="banner-img">
            <h3 class="banner-title">RANKING ESCOLA</h3>
        </div>

        <div class="card-303030-ranking p-4 d-flex flex-column align-items-center">

            <div class="row p-3 text-white align-items-center w-100 text-center d-none d-md-flex">
                <div class="col-12 col-md-3 mb-2 mb-md-0">POSIÇÃO</div>
                <div class="col-12 col-md-6 mb-2 mb-md-0">NOME</div>
                <div class="col-12 col-md-3">PONTOS</div>
            </div>

            <div class="row card-b4b4b4 p-3 mb-3 text-dark align-items-center w-100 text-center">
                <div class="col-12 col-md-3 fw-bold mb-2 mb-md-0">1°</div>
                <div class="col-12 col-md-6 mb-2 mb-md-0">Teste Escola</div>
                <div class="col-12 col-md-3 fw-bold">10000000 </div>
            </div>

        </div>
    </div>

    <div class="row">
        <a href="{{ route('game.menu') }}"
            class="btn-exit text-decoration-none text-white w-100 p-1 position-relative d-inline-block overflow-hidden mt-4 mb-1">
            <i class="bi bi-arrow-left icon" style="font-size: 20px; margin-top: 2px;"></i>
            <span class="exit-text" style="font-size: 18px;">Voltar</span>
        </a>
    </div>
</div>