@php
    $fundamentalGrades = $grades->filter(function ($grade) {
        preg_match('/\d+/', $grade->name, $m);
        return isset($m[0]) && $m[0] >= 6 && $m[0] <= 9;
    });

    $medioGrades = $grades->filter(function ($grade) {
        preg_match('/\d+/', $grade->name, $m);
        return isset($m[0]) && $m[0] >= 1 && $m[0] <= 3;
    });
@endphp

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
                                    @forelse($fundamentalGrades as $grade)
                                        <a href="{{ route('game.display', ['grade' => $grade->id]) }}"
                                            class="btn home-start-btn grade-btn">
                                            {{ $grade->name }}
                                        </a>
                                    @empty
                                        <div class="text-white-50 small text-center">
                                            Nenhuma série cadastrada.
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="grade-card h-100">
                                <div class="grade-card-header text-center mb-4">
                                    <h5 class="grade-card-title mb-0">Ensino Médio</h5>
                                </div>

                                <div class="d-grid gap-3">
                                    @forelse($medioGrades as $grade)
                                        <a href="{{ route('game.display', ['grade' => $grade->id]) }}"
                                            class="btn home-start-btn grade-btn">
                                            {{ $grade->name }}
                                        </a>
                                    @empty
                                        <div class="text-white-50 small text-center">
                                            Nenhuma série cadastrada.
                                        </div>
                                    @endforelse
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