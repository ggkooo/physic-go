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

<div class="modal fade" id="modalDerrota" tabindex="-1" aria-labelledby="modalDerrotaLabel" aria-hidden="true"
  data-bs-backdrop="static" data-bs-keyboard="false">
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

<div class="modal fade" id="modalVitoria" tabindex="-1" aria-labelledby="modalVitoriaLabel" aria-hidden="true"
  data-bs-backdrop="static" data-bs-keyboard="false">
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
    const STORAGE_KEYS = {
      LOCK: 'quizLocked',
      USED_HINTS: 'quizUsedHints',
      USED_SWAPS: 'quizUsedSwaps'
    };

    let isLocked = localStorage.getItem(STORAGE_KEYS.LOCK) === '1';
    const MAX_HINTS = 3;
    const MAX_SWAPS = 3;

    let usedHints = Number(localStorage.getItem(STORAGE_KEYS.USED_HINTS) || 0);
    let usedSwaps = Number(localStorage.getItem(STORAGE_KEYS.USED_SWAPS) || 0);

    let idx = 0;
    let score = 0;
    let hasSavedScore = false;

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
    const btnVoltarMenuDerrota = document.getElementById('btnVoltarMenu');
    const btnVoltarMenuVitoria = document.getElementById('btnVoltarMenuVitoria');

    function getModal(id) {
      const el = document.getElementById(id);
      if (!el) return null;
      const modal = (window.bootstrap?.Modal)
        ? new bootstrap.Modal(el, { backdrop: 'static', keyboard: false })
        : null;

      el.addEventListener('hide.bs.modal', (e) => {
        if (localStorage.getItem(STORAGE_KEYS.LOCK) === '1') e.preventDefault();
      });

      return { el, modal };
    }

    const derrota = getModal('modalDerrota');
    const vitoria = getModal('modalVitoria');

    function showModal(mod) {
      if (!mod) return;
      if (mod.modal) mod.modal.show();
      else {
        mod.el.classList.add('show');
        mod.el.style.display = 'block';
      }
    }

    function disableIcon(el) {
      if (!el) return;
      el.style.opacity = '0.4';
      el.style.pointerEvents = 'none';
      el.title = 'Limite atingido';
    }

    function updateIconsState() {
      if (usedHints >= MAX_HINTS) {
        disableIcon(btnHint);
      } else if (btnHint) {
        btnHint.style.opacity = '';
        btnHint.style.pointerEvents = '';
        btnHint.title = `Mostrar dica (${MAX_HINTS - usedHints} restante${MAX_HINTS - usedHints === 1 ? '' : 's'})`;
      }
      if (usedSwaps >= MAX_SWAPS) {
        disableIcon(btnSwap);
      } else if (btnSwap) {
        btnSwap.style.opacity = '';
        btnSwap.style.pointerEvents = '';
        btnSwap.title = `Trocar questão (${MAX_SWAPS - usedSwaps} restante${MAX_SWAPS - usedSwaps === 1 ? '' : 's'})`;
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
        const totalMax = qs.length * 10;
        if (!hasSavedScore && score === totalMax) {
          hasSavedScore = true;
          saveScore(score).finally(() => showModal(vitoria));
        } else {
          showModal(vitoria);
        }
        return;
      }

      nivel.textContent = `Nível ${i + 1}`;
      enunciado.innerHTML = (q.statement || '').replace(/<\/?p>/gi, '');

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

    function lockGame() {
      localStorage.setItem(STORAGE_KEYS.LOCK, '1');
      isLocked = true;
      showModal(derrota);
      altCards.forEach(c => c.style.pointerEvents = 'none');
      if (btnHint) btnHint.style.pointerEvents = 'none';
      if (btnSwap) btnSwap.style.pointerEvents = 'none';
    }

    function unlockAndResetAll() {
      localStorage.removeItem(STORAGE_KEYS.LOCK);
      localStorage.removeItem(STORAGE_KEYS.USED_HINTS);
      localStorage.removeItem(STORAGE_KEYS.USED_SWAPS);
    }

    function check(letter) {
      if (isLocked) return;
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
        }, 150);
      } else {
        lockGame();
      }
    }

    function resetCounters() {
      usedHints = 0;
      usedSwaps = 0;
      localStorage.setItem(STORAGE_KEYS.USED_HINTS, '0');
      localStorage.setItem(STORAGE_KEYS.USED_SWAPS, '0');
      updateIconsState();
    }

    const mapLetters = ['a', 'b', 'c', 'd', 'e'];
    altCards.forEach((card, i) => {
      card.style.cursor = 'pointer';
      card.addEventListener('click', () => check(mapLetters[i]));
    });

    btnSwap?.addEventListener('click', () => {
      if (isLocked) return;
      if (usedSwaps >= MAX_SWAPS) return;
      if (!qs[idx]) return;

      const moved = qs.splice(idx, 1)[0];
      qs.push(moved);

      usedSwaps++;
      localStorage.setItem(STORAGE_KEYS.USED_SWAPS, String(usedSwaps));

      render(idx);
      updateIconsState();
    });

    btnHint?.addEventListener('click', () => {
      if (isLocked) return;
      if (usedHints >= MAX_HINTS) return;

      const q = qs[idx];
      if (!q) return;
      hintText.textContent = q.hint || 'Sem dica para esta questão.';
      hintBox.classList.remove('d-none');
      hintBox.classList.add('show');

      usedHints++;
      localStorage.setItem(STORAGE_KEYS.USED_HINTS, String(usedHints));
      updateIconsState();
    });

    function saveScore(points) {
      const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
      const totalQuestions = (window.__QUESTIONS__ || []).length;

      return fetch("{{ route('rankings.store') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrf
        },
        body: JSON.stringify({
          points: points,
          total_questions: totalQuestions
        })
      }).then(async (res) => {
        if (!res.ok) {
          const data = await res.json().catch(() => ({}));
          console.warn("Falha ao salvar ranking:", data);
          return false;
        }
        return true;
      }).catch(err => {
        console.error("Erro ao salvar ranking:", err);
        return false;
      });
    }

    btnVoltarMenuDerrota?.addEventListener('click', () => unlockAndResetAll());
    btnVoltarMenuVitoria?.addEventListener('click', () => unlockAndResetAll());

    if (!qs.length) {
      lockGame();
      return;
    }

    if (isLocked) {
      lockGame();
      return;
    }

    resetCounters();

    render(idx);
  });
</script>