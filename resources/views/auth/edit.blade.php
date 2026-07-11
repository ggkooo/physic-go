@php
    $selectedAvatar = old('avatar', auth()->user()->avatar ?: 'explorador');
@endphp

<div class="container d-flex align-items-center justify-content-center py-4">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-md-10 col-lg-10 col-xl-10">
            <div class="home-panel">
                <div class="home-panel-content">
                    <div id="profileSummary">
                        <div class="profile-header">
                            <div class="profile-main-info">
                                <div class="profile-avatar-main">
                                    {{ $avatars[$selectedAvatar]['emoji'] ?? '🧑‍🚀' }}
                                </div>

                                <div class="profile-identification">
                                    <h1 class="home-title mb-1">{{ auth()->user()->name }}</h1>

                                    <div class="profile-school">
                                        <i class="bi bi-mortarboard-fill"></i>
                                        <span>{{ auth()->user()->school ?: 'Escola não informada' }}</span>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="profile-settings-btn" id="btnOpenSettings">
                                <i class="bi bi-gear-fill"></i>
                                <span>Configurações</span>
                            </button>
                        </div>

                        <div class="profile-highlight-grid mt-4 mb-4">
                            <div class="profile-highlight">
                                <span class="profile-highlight-icon"><i class="bi bi-lightning-charge-fill"></i></span>
                                <div>
                                    <strong>{{ number_format($stats['totalXp'], 0, ',', '.') }} XP</strong>
                                    <small>Experiência acumulada</small>
                                </div>
                            </div>

                            <div class="profile-highlight">
                                <span class="profile-highlight-icon"><i class="bi bi-bullseye"></i></span>
                                <div>
                                    <strong>{{ number_format($stats['accuracyRate'], 1, ',', '.') }}%</strong>
                                    <small>Aproveitamento geral</small>
                                </div>
                            </div>

                            <div class="profile-highlight">
                                <span class="profile-highlight-icon"><i class="bi bi-award-fill"></i></span>
                                <div>
                                    <strong>{{ collect($medals)->where('earned', true)->count() }} medalhas</strong>
                                    <small>Conquistas desbloqueadas</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success profile-alert mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div id="profileSettings" class="{{ $errors->any() ? '' : 'd-none' }}">
                        <div class="settings-header mb-4">
                            <div>
                                <h2 class="settings-title mb-1">Editar perfil</h2>
                                <p class="settings-description mb-0">Atualize suas informações e escolha seu avatar.</p>
                            </div>

                            <button type="button" class="settings-close-btn" id="btnCloseSettings" aria-label="Fechar configurações">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                    <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                        <div class="row g-4 align-items-stretch">
                            <div class="col-12 col-lg-6">
                                <div class="profile-section h-100">
                                    <div class="text-center mb-4">
                                        <h5 class="profile-section-title mb-1">
                                            Escolha seu avatar
                                        </h5>
                                    </div>

                                    <div class="avatar-preview" id="avatarPreview">
                                        {{ $avatars[$selectedAvatar]['emoji'] ?? '🧑‍🚀' }}
                                    </div>

                                    <strong
                                        class="avatar-name d-block text-center mt-2 mb-4"
                                        id="avatarName"
                                    >
                                        {{ $avatars[$selectedAvatar]['name'] ?? 'Explorador' }}
                                    </strong>

                                    <div class="avatar-grid">
                                        @foreach ($avatars as $key => $avatar)
                                            <label
                                                class="avatar-option {{ $selectedAvatar === $key ? 'selected' : '' }}"
                                                title="{{ $avatar['name'] }}"
                                            >
                                                <input
                                                    type="radio"
                                                    name="avatar"
                                                    value="{{ $key }}"
                                                    data-emoji="{{ $avatar['emoji'] }}"
                                                    data-name="{{ $avatar['name'] }}"
                                                    {{ $selectedAvatar === $key ? 'checked' : '' }}
                                                >

                                                <span class="avatar-option-content">
                                                    <span class="avatar-option-emoji">
                                                        {{ $avatar['emoji'] }}
                                                    </span>

                                                    <small>{{ $avatar['name'] }}</small>
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>

                                    @error('avatar')
                                        <small class="text-danger d-block text-center mt-3">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="profile-section h-100">
                                    <h5 class="profile-section-title mb-4 text-center">
                                        Informações do perfil
                                    </h5>

                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="name" class="form-label fw-bold">
                                                Nome
                                            </label>

                                            <div class="position-relative">
                                                <i class="bi bi-person position-absolute top-50 translate-middle-y ms-3 fs-4"></i>

                                                <input
                                                    type="text"
                                                    class="form-control ps-5 p-2 @error('name') is-invalid @enderror"
                                                    name="name"
                                                    id="name"
                                                    value="{{ old('name', auth()->user()->name) }}"
                                                    placeholder="Digite seu nome"
                                                >
                                            </div>

                                            @error('name')
                                                <small class="text-danger d-block mt-1">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="school" class="form-label fw-bold">
                                                Escola
                                            </label>

                                            <div class="position-relative">
                                                <i class="bi bi-mortarboard position-absolute top-50 translate-middle-y ms-3 fs-5 profile-field-icon"></i>

                                                <select
                                                    class="form-select ps-5 p-2 @error('school') is-invalid @enderror"
                                                    name="school"
                                                    id="school"
                                                >
                                                    <option value="">Selecione sua escola</option>

                                                    @foreach ($schools as $school)
                                                        <option
                                                            value="{{ $school->school_name }}"
                                                            @selected(
                                                                old('school', auth()->user()->school)
                                                                === $school->school_name
                                                            )
                                                        >
                                                            {{ $school->school_name }}

                                                            @if ($school->city || $school->state)
                                                                — {{ $school->city }}
                                                                {{ $school->city && $school->state ? '/' : '' }}
                                                                {{ $school->state }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @error('school')
                                                <small class="text-danger d-block mt-1">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="btn home-start-btn">
                                Salvar alterações
                            </button>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="button" class="settings-cancel-btn" id="btnCancelSettings">
                                Cancelar
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

           <div class="home-panel mt-4">
    <div class="home-panel-content">
        <div class="student-progress">
            <div class="text-center mb-4">
                <div class="home-icon mb-3">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>

                <h2 class="home-title mb-2">Minha evolução</h2>

                <p class="home-subtitle mb-0">
                    Acompanhe seu desempenho e descubra onde pode melhorar.
                </p>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-6 col-lg">
                    <div class="progress-stat h-100">
                        <span class="progress-stat-icon">
                            <i class="bi bi-ui-checks"></i>
                        </span>

                        <strong>{{ $stats['totalAnswered'] }}</strong>
                        <small>Respondidas</small>
                    </div>
                </div>

                <div class="col-6 col-lg">
                    <div class="progress-stat h-100">
                        <span class="progress-stat-icon">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>

                        <strong>{{ $stats['totalCorrect'] }}</strong>
                        <small>Acertos</small>
                    </div>
                </div>

                <div class="col-6 col-lg">
                    <div class="progress-stat h-100">
                        <span class="progress-stat-icon">
                            <i class="bi bi-bullseye"></i>
                        </span>

                        <strong>
                            {{ number_format($stats['accuracyRate'], 1, ',', '.') }}%
                        </strong>

                        <small>Taxa de acertos</small>
                    </div>
                </div>

                <div class="col-6 col-lg">
                    <div class="progress-stat h-100">
                        <span class="progress-stat-icon">
                            <i class="bi bi-stopwatch-fill"></i>
                        </span>

                        <strong>
                            {{ number_format($stats['averageTime'], 1, ',', '.') }}s
                        </strong>

                        <small>Tempo médio</small>
                    </div>
                </div>

                <div class="col-12 col-lg">
                    <div class="progress-stat progress-stat-xp h-100">
                        <span class="progress-stat-icon">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </span>

                        <strong>
                            {{ number_format($stats['totalXp'], 0, ',', '.') }}
                        </strong>

                        <small>XP total</small>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12 col-lg-5">
                    <div class="progress-panel h-100">
                        <div class="progress-panel-heading">
                            <div>
                                <h3>Assuntos para revisar</h3>
                                <p>Conteúdos em que você mais errou.</p>
                            </div>

                            <i class="bi bi-graph-down-arrow"></i>
                        </div>

                        @forelse ($topicsWithMostErrors as $topic)
                            @php
                                $maxErrors = max(
                                    1,
                                    (int) $topicsWithMostErrors->max('errors')
                                );

                                $width = round(
                                    ((int) $topic->errors / $maxErrors) * 100
                                );
                            @endphp

                            <div class="topic-row">
                                <div class="d-flex justify-content-between gap-3 mb-2">
                                    <span>{{ $topic->topic }}</span>

                                    <strong>
                                        {{ $topic->errors }}
                                        {{ $topic->errors == 1 ? 'erro' : 'erros' }}
                                    </strong>
                                </div>

                                <div class="topic-bar">
                                    <span style="width: {{ $width }}%"></span>
                                </div>
                            </div>
                        @empty
                            <div class="progress-empty text-center">
                                <i class="bi bi-stars"></i>

                                <p class="mb-0">
                                    Responda algumas questões para visualizar
                                    seus pontos de melhoria.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="col-12 col-lg-7">
                    <div class="progress-panel h-100">
                        <div class="progress-panel-heading">
                            <div>
                                <h3>Minhas medalhas</h3>

                                <p>
                                    {{ collect($medals)->where('earned', true)->count() }}
                                    de {{ count($medals) }} conquistadas
                                </p>
                            </div>

                            <i class="bi bi-award-fill"></i>
                        </div>

                        <div class="medal-grid">
                            @foreach ($medals as $medal)
                                <div
                                    class="medal-item {{ $medal['earned'] ? 'earned' : 'locked' }}"
                                >
                                    <div class="medal-icon">
                                        <i
                                            class="bi {{ $medal['earned'] ? $medal['icon'] : 'bi-lock-fill' }}"
                                        ></i>
                                    </div>

                                    <div>
                                        <strong>{{ $medal['name'] }}</strong>
                                        <small>{{ $medal['description'] }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
        </div>
    </div>
</div>

<div class="text-center mt-3 mb-4">
    <a href="{{ route('home') }}" class="home-logout-link text-decoration-none">
        <i class="bi bi-arrow-left me-1"></i>
        Voltar
    </a>
</div>

<script>
    const profileSummary = document.getElementById('profileSummary');
    const profileSettings = document.getElementById('profileSettings');

    function openProfileSettings() {
        profileSummary.classList.add('d-none');
        profileSettings.classList.remove('d-none');
        profileSettings.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function closeProfileSettings() {
        profileSettings.classList.add('d-none');
        profileSummary.classList.remove('d-none');
    }

    document.getElementById('btnOpenSettings')?.addEventListener('click', openProfileSettings);
    document.getElementById('btnCloseSettings')?.addEventListener('click', closeProfileSettings);
    document.getElementById('btnCancelSettings')?.addEventListener('click', closeProfileSettings);

    @if ($errors->any())
        openProfileSettings();
    @endif

    document.querySelectorAll('.avatar-option input').forEach((input) => {
        input.addEventListener('change', function () {
            document.querySelectorAll('.avatar-option').forEach((option) => {
                option.classList.remove('selected');
            });

            this.closest('.avatar-option').classList.add('selected');
            document.getElementById('avatarPreview').textContent = this.dataset.emoji;
            document.getElementById('avatarName').textContent = this.dataset.name;
        });
    });
</script>