<div class="container d-flex align-items-center justify-content-center py-4">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-lg-10 col-xl-8">
            <div class="home-panel">
                <div class="home-panel-content text-center">
                    <div class="home-icon mb-4">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>

                    <h1 class="home-title mb-2">Escolha a Série</h1>
                    <p class="home-subtitle mb-5">
                        Selecione a etapa de ensino para iniciar o quiz.
                    </p>

                    <div class="row g-4 text-start mb-4">
                        <div class="col-12 col-lg-6">
                            <div class="grade-card h-100">
                                <div class="grade-card-header text-center mb-4">
                                    <h5 class="grade-card-title mb-0">Ensino Fundamental</h5>
                                </div>

                                <div class="d-grid gap-3">
                                    <a href="{{ route('game.display', ['grade' => '6']) }}"
                                        class="btn home-start-btn grade-btn">
                                        6º Ano
                                    </a>
                                    <a href="{{ route('game.display', ['grade' => '7']) }}"
                                        class="btn home-start-btn grade-btn">
                                        7º Ano
                                    </a>
                                    <a href="{{ route('game.display', ['grade' => '8']) }}"
                                        class="btn home-start-btn grade-btn">
                                        8º Ano
                                    </a>
                                    <a href="{{ route('game.display', ['grade' => '9']) }}"
                                        class="btn home-start-btn grade-btn">
                                        9º Ano
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="grade-card h-100">
                                <div class="grade-card-header text-center mb-4">
                                    <h5 class="grade-card-title mb-0">Ensino Médio</h5>
                                </div>

                                <div class="d-grid gap-3">
                                    <a href="{{ route('game.display', ['grade' => '1']) }}"
                                        class="btn home-start-btn grade-btn">
                                        1º Ano
                                    </a>
                                    <a href="{{ route('game.display', ['grade' => '2']) }}"
                                        class="btn home-start-btn grade-btn">
                                        2º Ano
                                    </a>
                                    <a href="{{ route('game.display', ['grade' => '3']) }}"
                                        class="btn home-start-btn grade-btn">
                                        3º Ano
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('game.menu') }}" class="home-logout-link text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i>
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>