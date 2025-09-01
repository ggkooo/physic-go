<div class="d-flex flex-column align-items-center mt-5">


    <div class="col-md-10 col-10 card-questions mt-3 mb-5">
        <div class="content-questions w-100">

            <div class="col-md-12 d-flex justify-content-between">

                <div class="col-md-6">
                    <span>
                        <h5><strong id="nivel">Nível 1</strong></h5>
                    </span>
                </div>

                <div class="col-md-6 text-end">
                    <span>
                        <h5><strong id="pontuacao">Pontuação: 0</strong></h5>
                    </span>
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
            </div>

            <div class="col-md-12 d-flex justify-content-between">
                <div class="col-md-6">
                    <i class="bi bi-lightbulb-fill me-2" style="font-size: 35px;"></i>
                    <i class="bi bi-arrow-left-right" style="font-size: 35px;"></i>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/game/menu" class="btn btn-secondary p-2 mt-2 px-4">Desistir</a>
                </div>
            </div>


        </div>
    </div>




</div>

<!-- Modal de Derrota -->
<div class="modal fade" id="modalDerrota" tabindex="-1" aria-labelledby="modalDerrotaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title d-flex align-items-center gap-2" id="modalDerrotaLabel">
          <i class="bi bi-emoji-frown" style="font-size: 2rem;"></i>
          Que pena!
        </h5>
        <!-- Botão de fechar removido -->
      </div>
      <div class="modal-body text-center">
        <p class="mb-2" style="font-size: 1.2rem;">Você errou a resposta desta vez.</p>
        <p class="mb-0">Não desanime! Tente novamente e mostre seu conhecimento!</p>
      </div>
      <div class="modal-footer justify-content-center">
        <a href="/game/menu" class="btn btn-danger btn-lg px-4" id="btnVoltarMenu">
          <i class="bi bi-arrow-left-circle me-2"></i>Voltar ao menu
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Vitória -->
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
        <a href="/game/menu" class="btn btn-success btn-lg px-4 me-2" id="btnVoltarMenuVitoria">
          <i class="bi bi-arrow-left-circle me-2"></i>Voltar ao menu
        </a>
        <a href="/game/students_ranking" class="btn btn-outline-success btn-lg px-4" id="btnRankingVitoria">
          <i class="bi bi-trophy me-2"></i>Visualizar Ranking
        </a>
      </div>
    </div>
  </div>
</div>

<script>
    let questoes = [];
    let indiceAtual = 0;
    let respostaCorreta = '';
    let bloqueado = false;
    let nivel = 1;
    let pontos = 0;

    // Checa se o usuário perdeu ou venceu anteriormente
    if (localStorage.getItem('quiz_perdeu') === '1' || localStorage.getItem('quiz_vitoria') === '1') {
        localStorage.removeItem('quiz_perdeu');
        localStorage.removeItem('quiz_vitoria');
        window.location.href = '/game/menu';
    }

    function atualizarNivel() {
        document.getElementById('nivel').textContent = 'Nível ' + nivel;
    }

    function atualizarPontuacao() {
        document.getElementById('pontuacao').textContent = 'Pontuação: ' + pontos;
    }

    function exibirQuestao(indice) {
        const q = questoes[indice];
        document.getElementById('enunciado').textContent = q.enunciado;
        document.getElementById('alternativa_a').textContent = 'A) ' + q.alternativa_a;
        document.getElementById('alternativa_b').textContent = 'B) ' + q.alternativa_b;
        document.getElementById('alternativa_c').textContent = 'C) ' + q.alternativa_c;
        document.getElementById('alternativa_d').textContent = 'D) ' + q.alternativa_d;
        respostaCorreta = q.resposta_correta;
        bloqueado = false;
        atualizarNivel();
        atualizarPontuacao();
    }

    function alternativaClickHandler(letra) {
        if (bloqueado) return;
        bloqueado = true;
        const resposta = (respostaCorreta || '').trim().toLowerCase();
        const letraClicada = (letra || '').trim().toLowerCase();
        if (letraClicada === resposta) {
            indiceAtual++;
            nivel++;
            pontos += 1000;
            setTimeout(() => {
                if (indiceAtual < questoes.length) {
                    exibirQuestao(indiceAtual);
                } else {
                    // Marca vitória no localStorage
                    localStorage.setItem('quiz_vitoria', '1');
                    // Salva ranking antes de mostrar a modal de vitória
                    salvarRanking(pontos, function() {
                        var modalVitoria = new bootstrap.Modal(document.getElementById('modalVitoria'), { backdrop: 'static', keyboard: false });
                        modalVitoria.show();
                    });
                }
            }, 300);
        } else {
            // Marca que perdeu no localStorage
            localStorage.setItem('quiz_perdeu', '1');
            // Exibe modal sem possibilidade de fechar manualmente
            var modal = new bootstrap.Modal(document.getElementById('modalDerrota'), { backdrop: 'static', keyboard: false });
            modal.show();
        }
    }

    function salvarRanking(pontos, callback) {
        fetch('/game/save-ranking', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ points: pontos })
        })
        .then(response => response.json())
        .then(data => {
            if (callback) callback(data);
        })
        .catch(error => {
            console.error('Erro ao salvar ranking:', error);
            if (callback) callback(null);
        });
    }

    // Limpa localStorage ao sair das modais de vitória/derrota
    function limparQuizFlags() {
        localStorage.removeItem('quiz_perdeu');
        localStorage.removeItem('quiz_vitoria');
    }
    document.addEventListener('DOMContentLoaded', function() {
        function getSerieFromUrl() {
            const params = new URLSearchParams(window.location.search);
            return params.get('serie');
        }
        const serie = getSerieFromUrl();
        if (serie) {
            fetch(`/game/questions-by-serie?serie=${encodeURIComponent(serie)}`)
                .then(response => response.json())
                .then(data => {
                    if (Array.isArray(data) && data.length > 0) {
                        questoes = data;
                        indiceAtual = 0;
                        nivel = 1;
                        // Inicializa pontuação
                        pontos = 0;
                        exibirQuestao(indiceAtual);
                    } else {
                        document.getElementById('enunciado').textContent = 'Nenhuma questão encontrada para esta série.';
                        document.getElementById('alternativa_a').textContent = '';
                        document.getElementById('alternativa_b').textContent = '';
                        document.getElementById('alternativa_c').textContent = '';
                        document.getElementById('alternativa_d').textContent = '';
                    }
                })
                .catch(error => {
                    document.getElementById('enunciado').textContent = 'Erro ao buscar questões.';
                    document.getElementById('alternativa_a').textContent = '';
                    document.getElementById('alternativa_b').textContent = '';
                    document.getElementById('alternativa_c').textContent = '';
                    document.getElementById('alternativa_d').textContent = '';
                    console.error('Erro ao buscar questões:', error);
                });
        } else {
            document.getElementById('enunciado').textContent = 'Nenhuma série informada na URL.';
            document.getElementById('alternativa_a').textContent = '';
            document.getElementById('alternativa_b').textContent = '';
            document.getElementById('alternativa_c').textContent = '';
            document.getElementById('alternativa_d').textContent = '';
        }

        // Torna as alternativas clicáveis
        document.getElementById('alternativa_a').parentElement.style.cursor = 'pointer';
        document.getElementById('alternativa_b').parentElement.style.cursor = 'pointer';
        document.getElementById('alternativa_c').parentElement.style.cursor = 'pointer';
        document.getElementById('alternativa_d').parentElement.style.cursor = 'pointer';
        document.getElementById('alternativa_a').parentElement.onclick = function() { alternativaClickHandler('a'); };
        document.getElementById('alternativa_b').parentElement.onclick = function() { alternativaClickHandler('b'); };
        document.getElementById('alternativa_c').parentElement.onclick = function() { alternativaClickHandler('c'); };
        document.getElementById('alternativa_d').parentElement.onclick = function() { alternativaClickHandler('d'); };

        // Adiciona listeners aos botões das modais para limpar localStorage
        var btnVoltarMenu = document.getElementById('btnVoltarMenu');
        if (btnVoltarMenu) {
            btnVoltarMenu.addEventListener('click', limparQuizFlags);
        }
        var btnVoltarMenuVitoria = document.getElementById('btnVoltarMenuVitoria');
        if (btnVoltarMenuVitoria) {
            btnVoltarMenuVitoria.addEventListener('click', limparQuizFlags);
        }
        var btnRankingVitoria = document.getElementById('btnRankingVitoria');
        if (btnRankingVitoria) {
            btnRankingVitoria.addEventListener('click', limparQuizFlags);
        }
    });
</script>

<!-- Bootstrap JS Bundle (for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
