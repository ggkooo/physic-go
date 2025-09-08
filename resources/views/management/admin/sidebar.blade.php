<div class="sidebar d-flex flex-column p-3">
  <div class="logo">
    <img src="{{ asset('assets/img/physic-go-logo.png') }}" alt="Logo" class="img-fluid mt-2 mb-2" width="170">
  </div>
  <hr class="text-white">
  <ul class="nav nav-pills flex-column mb-auto">

    <li class="nav-item">
      <a href="/management/home" class="nav-link text-white mb-1 {{ activeClass('management/home') }}">
        <i class="bi bi-house-door-fill me-2"></i> Home
      </a>
    </li>

    <li>
      <a href="/management/publications" class="nav-link text-white mb-1 {{ activeClass('management/publications') }}">
        <i class="bi bi-magic me-2"></i> Publicações
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-white d-flex justify-content-between align-items-center mb-1" data-bs-toggle="collapse"
        href="#submenuGestao" role="button" aria-expanded="false" aria-controls="submenuGestao">
        <span><i class="bi bi-bar-chart-fill me-2"></i> Gestão</span>
      </a>
      <div
        class="collapse ps-4 {{ request()->is('management/schools*') || request()->is('management/messages*') || request()->is('management/statistics*') ? 'show' : '' }}"
        id="submenuGestao">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a href="/management/schools"
              class="nav-link text-white mb-1 {{ activeClass('management/schools*') }}">Escolas</a>
          </li>
          <li class="nav-item">
            <a href="/management/messages"
              class="nav-link text-white mb-1 {{ activeClass('management/messages*') }}">Mensagens</a>
          </li>
          <li class="nav-item">
            <a href="/management/statistics"
              class="nav-link text-white mb-1 {{ activeClass('management/statistics') }}">Estatísticas</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link text-white d-flex justify-content-between align-items-center mb-1" data-bs-toggle="collapse"
        href="#submenuQuestions" role="button" aria-expanded="false" aria-controls="submenuQuestions">
        <span><i class="bi bi-question-lg me-2"></i> Perguntas</span>
      </a>
      <div
        class="collapse ps-4 {{ request()->is('management/questions*') || request()->is('management/template') ? 'show' : '' }}"
        id="submenuQuestions">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a href="/management/questionsDisplay"
              class="nav-link text-white mb-1 {{ activeClass(['management/questionsDisplay*', 'management/questionsRegister*']) }}">
              Enunciado
            </a>
          </li>
          <li class="nav-item">
            <a href="/management/questionsLevel"
              class="nav-link text-white mb-1 {{ activeClass('management/questionsLevel*') }}">Nível</a>
          </li>
          <li class="nav-item">
            <a href="/management/questionsContent"
              class="nav-link text-white mb-1 {{ activeClass('management/questionsContent*') }}">Conteúdo</a>
          </li>
          <li class="nav-item">
            <a href="/management/template"
              class="nav-link text-white mb-1 {{ activeClass('management/template') }}">Gabarito</a>
          </li>
        </ul>
      </div>
    </li>

    <li>
      <a href="/management/users" class="nav-link text-white mb-1 {{ activeClass('management/users*') }}">
        <i class="bi bi-people-fill me-2"></i> Usuários
      </a>
    </li>

    <li>
      <a href="/management/teams" class="nav-link text-white mb-1 {{ activeClass('management/teams*') }}">
        <i class="bi bi-rocket-takeoff-fill me-2"></i> Equipes
      </a>
    </li>

    <!-- <li>
      <a href="#" class="nav-link text-white mb-1">
        <i class="bi bi-journal-bookmark-fill me-2"></i> Módulo de Estudo
      </a>
    </li> -->

    <!-- <li>
      <a href="#" class="nav-link text-white mb-1">
        <i class="bi bi-server me-2"></i> Servidor
      </a>
    </li> -->

    <li>
      <a href="/users/logout" class="nav-link text-white mb-1">
        <i class="bi bi-box-arrow-left me-2"></i> Logout
      </a>
    </li>

  </ul>
</div>
</li>

</ul>
</div>