<div class="d-flex flex-column align-items-center mt-5">
  <div class="col-md-10 col-10 card-questions mt-3 mb-5">
    <div class="content-questions w-100" id="questionContainer">
      <div class="col-md-12 d-flex justify-content-between">
        <div class="col-md-6">
          <h5><strong id="nivel">Nível 1</strong></h5>
        </div>
        <div class="col-md-6 text-end">
          <h5><strong id="pontuacao">Pontuação: 0</strong></h5>
        </div>
      </div>
      <p class="para">
        <span id="enunciado"></span>
      </p>
      <div class="col-md-12 d-flex flex-column align-items-center mb-2">
        <div class="card-alternativas p-3 mb-3 col-md-10 ">
          <span class="ms-3" id="alternativa_a"></span>
        </div>
        <div class="card-alternativas p-3 mb-3 col-md-10">
          <span class="ms-3" id="alternativa_b"></span>
        </div>
        <div class="card-alternativas p-3 mb-3 col-md-10">
          <span class="ms-3" id="alternativa_c"></span>
        </div>
        <div class="card-alternativas p-3 mb-3 col-md-10">
          <span class="ms-3" id="alternativa_d"></span>
        </div>
        <div class="card-alternativas p-3 mb-3 col-md-10">
          <span class="ms-3" id="alternativa_e"></span>
        </div>
      </div>

      <div class="col-md-12 d-flex justify-content-between">
        <div class="col-md-6 d-flex align-items-center gap-2">
          <i id="btnHint" class="bi bi-lightbulb-fill me-2" style="font-size: 35px; cursor:pointer;"
            title="Mostrar dica (máx. 3)"></i>
          <i id="btnSwap" class="bi bi-arrow-left-right" style="font-size: 35px; cursor:pointer;"
            title="Trocar questão (máx. 3)"></i>
        </div>
        <div class="col-md-6 text-end">
          <a href="{{ route('home') }}" class="btn btn-secondary p-2 mt-2 px-4">Desistir</a>
        </div>
      </div>

      <div id="hintBox" class="hint-box d-none mx-auto col-md-10">
        <div class="d-flex align-items-start gap-3">
          <div class="flex-grow-1">
            <h6 class="fw-bold mb-1 text-uppercase text-warning">Dica da questão</h6>
            <p id="hintText" class="mb-0 text-light"></p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalDerrota" tabindex="-1" aria-labelledby="modalDerrotaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title d-flex align-items-center gap-2" id="modalDerrotaLabel">
          <i class="bi bi-emoji-frown" style="font-size: 2rem;"></i>
          Que pena!
        </h5>
      </div>
      <div class="modal-body text-center">
        <p class="mb-2" style="font-size: 1.2rem;">Você errou a resposta desta vez.</p>
        <p class="mb-0">Não desanime! Tente novamente e mostre seu conhecimento!</p>
      </div>
      <div class="modal-footer justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-danger btn-lg px-4" id="btnVoltarMenu">
          <i class="bi bi-arrow-left-circle me-2"></i>Voltar ao menu
        </a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalVitoria" tabindex="-1" aria-labelledby="modalVitoriaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title d-flex align-items-center gap-2" id="modalVitoriaLabel">
          <i class="bi bi-emoji-laughing" style="font-size: 2rem;"></i>
          Parabéns!
        </h5>
      </div>
      <div class="modal-body text-center">
        <p class="mb-2" style="font-size: 1.2rem;">Você respondeu todas as questões corretamente!</p>
        <p class="mb-0">Continue assim, seu conhecimento está incrível!</p>
      </div>
      <div class="modal-footer justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-success btn-lg px-4 me-2" id="btnVoltarMenuVitoria">
          <i class="bi bi-arrow-left-circle me-2"></i>Voltar ao menu
        </a>
      </div>
    </div>
  </div>
</div>



<script>
  window.__QUESTIONS__ = @json($questions ?? []);
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const qs = window.__QUESTIONS__ || [];

    if (!qs.length) {
      if (window.bootstrap?.Modal) {
        new bootstrap.Modal(document.getElementById('modalDerrota')).show();
      } else {
        document.getElementById('modalDerrota')?.classList.add('show');
        document.getElementById('modalDerrota').style.display = 'block';
      }
      return;
    }

    let idx = 0;
    let score = 0;

    const MAX_HINTS = 3;
    const MAX_SWAPS = 3;
    let usedHints = 0;
    let usedSwaps = 0;

    const nivel = document.getElementById('nivel');
    const pontuacao = document.getElementById('pontuacao');
    const enunciado = document.getElementById('enunciado');
    const a = document.getElementById('alternativa_a');
    const b = document.getElementById('alternativa_b');
    const c = document.getElementById('alternativa_c');
    const d = document.getElementById('alternativa_d');
    const e = document.getElementById('alternativa_e');
    const hintBox = document.getElementById('hintBox');
    const hintText = document.getElementById('hintText');

    const altCards = Array.from(document.querySelectorAll('.card-alternativas'));
    const btnHint = document.getElementById('btnHint');
    const btnSwap = document.getElementById('btnSwap');

    function disableIcon(el) {
      if (!el) return;
      el.style.opacity = '0.4';
      el.style.pointerEvents = 'none';
      el.title = 'Limite atingido';
    }

    function updateIconsState() {
      if (usedHints >= MAX_HINTS) disableIcon(btnHint);
      else btnHint.title = `Mostrar dica (${MAX_HINTS - usedHints} restante${MAX_HINTS - usedHints === 1 ? '' : 's'})`;

      if (usedSwaps >= MAX_SWAPS) disableIcon(btnSwap);
      else btnSwap.title = `Trocar questão (${MAX_SWAPS - usedSwaps} restante${MAX_SWAPS - usedSwaps === 1 ? '' : 's'})`;
    }

    function showModal(id) {
      const el = document.getElementById(id);
      if (!el) return;
      if (window.bootstrap?.Modal) {
        new bootstrap.Modal(el).show();
      } else {
        el.classList.add('show');
        el.style.display = 'block';
      }
    }

    function showHideEmpty(card, text) {
      if (text && String(text).trim() !== '') card.classList.remove('d-none');
      else card.classList.add('d-none');
    }

    function clearAltFeedback() {
      altCards.forEach(c => {
        c.classList.remove('border-success', 'border-danger');
        c.style.borderWidth = '';
      });
    }

    function render(i) {
      const q = qs[i];
      if (!q) {
        showModal('modalVitoria');
        return;
      }

      nivel.textContent = `Nível ${i + 1}`;
      enunciado.textContent = q.statement || '';

      a.textContent = q.alternative_a || '';
      b.textContent = q.alternative_b || '';
      c.textContent = q.alternative_c || '';
      d.textContent = q.alternative_d || '';
      e.textContent = q.alternative_e || '';

      showHideEmpty(altCards[0], q.alternative_a);
      showHideEmpty(altCards[1], q.alternative_b);
      showHideEmpty(altCards[2], q.alternative_c);
      showHideEmpty(altCards[3], q.alternative_d);
      showHideEmpty(altCards[4], q.alternative_e);

      hintBox.classList.add('d-none');
      hintText.textContent = '';

      clearAltFeedback();
      updateIconsState();
    }

    function check(letter) {
      const q = qs[idx];
      if (!q) return;

      const correct = (letter.toLowerCase() === (q.correct_alternative || '').toLowerCase());
      const pos = { a: 0, b: 1, c: 2, d: 3, e: 4 }[letter];
      const clickedCard = altCards[pos];

      if (clickedCard) {
        clickedCard.classList.add(correct ? 'border-success' : 'border-danger');
        clickedCard.style.borderWidth = '2px';
      }

      if (correct) {
        score += 10;
        pontuacao.textContent = `Pontuação: ${score}`;
        idx++;
        setTimeout(() => {
          render(idx);
          if (!qs[idx]) showModal('modalVitoria');
        }, 150);
      } else {
        showModal('modalDerrota');
      }
    }

    const mapLetters = ['a', 'b', 'c', 'd', 'e'];
    altCards.forEach((card, i) => {
      card.style.cursor = 'pointer';
      card.addEventListener('click', () => check(mapLetters[i]));
    });

    btnHint?.addEventListener('click', () => {
      if (usedHints >= MAX_HINTS) return;
      const q = qs[idx];
      if (!q) return;

      hintText.textContent = q.hint || 'Sem dica para esta questão.';
      hintBox.classList.remove('d-none');
      hintBox.classList.add('show');

      usedHints++;
      if (usedHints >= MAX_HINTS) disableIcon(btnHint);
      else updateIconsState();
    });

    btnSwap?.addEventListener('click', () => {
      if (usedSwaps >= MAX_SWAPS) return;

      idx++;
      usedSwaps++;

      if (!qs[idx]) {
        updateIconsState();
        showModal('modalVitoria');
        return;
      }

      render(idx);
      if (usedSwaps >= MAX_SWAPS) disableIcon(btnSwap);
      else updateIconsState();
    });

    render(idx);
  });
</script>