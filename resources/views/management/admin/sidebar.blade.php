<div class="sidebar d-flex flex-column p-3">
  <div class="logo">
    <img src="{{ asset('assets/img/physic-go-logo.png') }}" alt="Logo" class="img-fluid mt-2 mb-2" width="170">
  </div>

  <hr class="text-white">

  <ul class="nav nav-pills flex-column mb-auto">
    @if(acesso('management'))
      <li class="nav-item mt-1 mb-2 px-3">
        <span class="text-white-50 small fw-bold text-uppercase">
          Gestão
        </span>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.home') }}" class="nav-link text-white mb-1 {{ activeClass('management/home') }}">
          <i class="bi bi-house-door-fill me-2"></i> Home
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.publications') }}"
          class="nav-link text-white mb-1 {{ activeClass('management/publications') }}">
          <i class="bi bi-magic me-2"></i> Publicações
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.schools') }}"
          class="nav-link text-white mb-1 {{ activeClass('management/schools*') }}">
          <i class="bi bi-building me-2"></i> Escolas
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.messages') }}"
          class="nav-link text-white mb-1 {{ activeClass('management/messages*') }}">
          <i class="bi bi-chat-left-text-fill me-2"></i> Mensagens
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.statistics') }}"
          class="nav-link text-white mb-1 {{ activeClass('management/statistics*') }}">
          <i class="bi bi-bar-chart-fill me-2"></i> Estatísticas
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.questions') }}"
          class="nav-link text-white mb-1 {{ activeClass('management/questions*') }}">
          <i class="bi bi-question-circle-fill me-2"></i> Questões
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.grades') }}"
          class="nav-link text-white mb-1 {{ activeClass('management/grades*') }}">
          <i class="bi bi-mortarboard-fill me-2"></i> Séries
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.contents') }}"
          class="nav-link text-white mb-1 {{ activeClass('management/contents*') }}">
          <i class="bi bi-journal-text me-2"></i> Conteúdo
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.template') }}"
          class="nav-link text-white mb-1 {{ activeClass('management/template*') }}">
          <i class="bi bi-card-checklist me-2"></i> Gabarito
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.challenge') }}"
          class="nav-link text-white mb-1 {{ activeClass('management/challenge*') }}">
          <i class="bi bi-lightning-charge-fill me-2"></i> Desafio Temático
        </a>
      </li>
    @endif

    @if(acesso('admin'))
      <li class="nav-item mt-3 mb-2 px-3">
        <span class="text-white-50 small fw-bold text-uppercase">
          Administração
        </span>
      </li>

      <li class="nav-item">
        <a href="{{ route('management.users') }}" class="nav-link text-white mb-1 {{ activeClass('management/users*') }}">
          <i class="bi bi-people-fill me-2"></i> Usuários
        </a>
      </li>
    @endif

    <li class="nav-item mt-3">
      <hr class="text-white-50">
      <a href="{{ route('logout') }}" class="nav-link text-white mb-1">
        <i class="bi bi-box-arrow-left me-2"></i> Logout
      </a>
    </li>
  </ul>
</div>