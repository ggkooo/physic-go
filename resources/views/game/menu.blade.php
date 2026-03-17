<div class="container d-flex align-items-center justify-content-center py-4">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
            <div class="home-panel text-center">
                <div class="home-panel-content">
                    <div class="home-icon mb-4">
                        <i class="bi bi-controller"></i>
                    </div>

                    <h1 class="home-title mb-2">Menu</h1>
                    <p class="home-subtitle mb-4">
                        Escolha uma opção para continuar.
                    </p>

                    <div class="d-grid mb-4">
                        <a href="{{ route('game.new') }}" class="btn home-start-btn">
                            Novo Jogo
                        </a>
                    </div>

                    <a href="{{ route('home') }}" class="home-logout-link text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i>
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-10 col-md-3 mb-4">
         <a href="{{ route('game.students-ranking') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">RANKING ALUNO</a>
    </div>
    <div class="col-10 col-md-3 mb-4">
        <a href="{{ route('game.schools-ranking') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">RANKING ESCOLA</a>
    </div> -->
<!-- <div class="col-10 col-md-3 mb-4">
         <a href="{{ route('game.rules') }}"><button class="btn btn-danger w-100 p-3 btn-default btn-raise">REGRAS</button></a>
    </div> -->