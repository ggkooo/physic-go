<div class="container d-flex align-items-center justify-content-center py-4">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-xl-8">
            <div class="home-panel">
                <div class="home-panel-content">
                    <div class="text-center mb-4">
                        <div class="home-icon mb-3">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <h1 class="home-title mb-2">Ranking Aluno</h1>
                        <p class="home-subtitle mb-0">
                            Confira os alunos com maior pontuação no quiz.
                        </p>
                    </div>

                    <div class="ranking-wrapper">
                        <div class="ranking-header d-none d-md-flex">
                            <div class="ranking-col ranking-col-position">Posição</div>
                            <div class="ranking-col ranking-col-name">Nome</div>
                            <div class="ranking-col ranking-col-points">Pontos</div>
                        </div>

                        @foreach($topStudents as $index => $student)
                            <div class="ranking-item {{ $index < 3 ? 'ranking-item-top' : '' }}">
                                <div class="ranking-col ranking-col-position">
                                    <div
                                        class="ranking-position-badge {{ $index === 0 ? 'first' : ($index === 1 ? 'second' : ($index === 2 ? 'third' : 'default')) }}">
                                        {{ $index + 1 }}º
                                    </div>
                                </div>

                                <div class="ranking-main-content">
                                    <div class="ranking-col ranking-col-name">
                                        <div class="ranking-mobile-label d-md-none">Aluno</div>
                                        <div class="ranking-student-name">{{ $student->user_name }}</div>
                                    </div>

                                    <div class="ranking-col ranking-col-points">
                                        <div class="ranking-mobile-label d-md-none">Pontuação</div>
                                        <div class="ranking-points">{{ $student->points }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('game.menu') }}" class="home-logout-link text-decoration-none">
                            <i class="bi bi-arrow-left me-1"></i>
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>