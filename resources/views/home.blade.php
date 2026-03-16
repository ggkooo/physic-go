<div class="container d-flex align-items-center justify-content-center py-4">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
            <div class="home-panel text-center">
                <div class="home-panel-content">
                    <div class="home-icon mb-4">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>

                    <h1 class="home-title mb-2">Quiz de Física</h1>
                    <p class="home-subtitle mb-4">
                        Inicie o desafio e teste seus conhecimentos.
                    </p>

                    <div class="d-grid mb-3">
                        <a href="{{ route('game.menu') }}" class="btn home-start-btn">
                            <i class="bi bi-play-fill me-2"></i>
                            Iniciar Quiz
                        </a>
                    </div>

                    <a href="{{ route('logout') }}" class="home-logout-link text-decoration-none">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Sair
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>