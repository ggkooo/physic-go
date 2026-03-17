<div class="container d-flex align-items-center justify-content-center py-4">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-xl-9">
            <div class="home-panel">
                <div class="home-panel-content">

                    <div class="quiz-status-bar mb-4">
                        <div class="quiz-status-item">
                            <span class="quiz-status-label">Nível</span>
                            <strong id="nivel" class="quiz-status-value">Nível 1</strong>
                        </div>

                        <div class="quiz-status-item text-center">
                            <span class="quiz-status-label">Tentativas</span>

                            <div id="vidasContainer" class="quiz-lives mt-2" aria-label="Vidas restantes">
                                <i class="bi bi-heart-fill"></i>
                                <i class="bi bi-heart-fill"></i>
                                <i class="bi bi-heart-fill"></i>
                            </div>
                        </div>

                        <div class="quiz-status-item text-md-end">
                            <span class="quiz-status-label">Pontuação</span>
                            <strong id="pontuacao" class="quiz-status-value">Pontuação: 0</strong>
                        </div>
                    </div>

                    <div class="quiz-question-card mb-4">
                        <p class="quiz-question-text mb-0">
                            <span id="enunciado"></span>
                        </p>
                    </div>

                    <div class="quiz-options">
                        <button type="button" class="quiz-option-btn" data-alt="a">
                            <span class="quiz-option-letter">A</span>
                            <span id="alternativa_a" class="quiz-option-text"></span>
                        </button>

                        <button type="button" class="quiz-option-btn" data-alt="b">
                            <span class="quiz-option-letter">B</span>
                            <span id="alternativa_b" class="quiz-option-text"></span>
                        </button>

                        <button type="button" class="quiz-option-btn" data-alt="c">
                            <span class="quiz-option-letter">C</span>
                            <span id="alternativa_c" class="quiz-option-text"></span>
                        </button>

                        <button type="button" class="quiz-option-btn" data-alt="d">
                            <span class="quiz-option-letter">D</span>
                            <span id="alternativa_d" class="quiz-option-text"></span>
                        </button>
                    </div>

                    <div class="quiz-footer mt-4">
                        <div class="quiz-footer-icons">
                            <button type="button" class="quiz-icon-btn" title="Dica">
                                <i class="bi bi-lightbulb-fill"></i>
                            </button>
                            <button type="button" class="quiz-icon-btn" title="Trocar questão">
                                <i class="bi bi-arrow-left-right"></i>
                            </button>
                        </div>

                        <div class="text-md-end">
                            <a href="{{ route('game.menu') }}" class="quiz-quit-btn text-decoration-none">
                                Desistir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDerrota" tabindex="-1" aria-labelledby="modalDerrotaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content quiz-modal-content quiz-modal-danger">
            <div class="quiz-modal-top text-center">
                <div class="quiz-modal-icon quiz-modal-icon-danger">
                    <i class="bi bi-emoji-frown"></i>
                </div>
                <h5 class="quiz-modal-heading" id="modalDerrotaLabel">Que pena!</h5>
                <p class="quiz-modal-subheading mb-0">Você errou a resposta desta vez.</p>
            </div>

            <div class="modal-body text-center pt-0">
                <p class="quiz-modal-text mb-0">
                    Não desanime. Revise o conteúdo e tente novamente para avançar no quiz.
                </p>
            </div>

            <div class="modal-footer border-0 justify-content-center pt-3">
                <a href="{{ route('game.menu') }}" class="btn home-start-btn quiz-modal-primary-btn" id="btnVoltarMenu">
                    Voltar ao menu
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVitoria" tabindex="-1" aria-labelledby="modalVitoriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content quiz-modal-content quiz-modal-success">
            <div class="quiz-modal-top text-center">
                <div class="quiz-modal-icon quiz-modal-icon-success">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                <h5 class="quiz-modal-heading" id="modalVitoriaLabel">Parabéns!</h5>
                <p class="quiz-modal-subheading mb-0">Você respondeu todas as questões corretamente.</p>
            </div>

            <div class="modal-body text-center pt-0">
                <p class="quiz-modal-text mb-0">
                    Excelente desempenho. Seu resultado foi salvo e você pode continuar acompanhando sua posição no
                    ranking.
                </p>
            </div>

            <div class="modal-footer border-0 justify-content-center flex-column flex-sm-row gap-2 pt-3">
                <a href="{{ route('game.menu') }}" class="btn home-start-btn quiz-modal-primary-btn"
                    id="btnVoltarMenuVitoria">
                    Voltar ao menu
                </a>

                <a href="{{ route('game.students-ranking') }}"
                    class="quiz-secondary-btn text-decoration-none quiz-modal-secondary-btn" id="btnRankingVitoria">
                    <i class="bi bi-trophy me-2"></i>
                    Visualizar Ranking
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
    let vidas = 3;
    const vidasMaximas = 3;

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

    function atualizarVidas() {
        const vidasTexto = document.getElementById('vidasTexto');
        const vidasContainer = document.getElementById('vidasContainer');

        if (vidasTexto) {
            vidasTexto.textContent = vidas === 1 ? '1 vida' : `${vidas} vidas`;
        }

        if (vidasContainer) {
            const hearts = vidasContainer.querySelectorAll('i');

            hearts.forEach((heart, index) => {
                if (index < vidas) {
                    heart.classList.remove('is-empty');
                    heart.classList.add('bi-heart-fill');
                } else {
                    heart.classList.add('is-empty');
                    heart.classList.add('bi-heart-fill');
                }
            });
        }
    }

    function limparEstadoAlternativas() {
        document.querySelectorAll('.quiz-option-btn').forEach(btn => {
            btn.classList.remove('is-correct', 'is-wrong');
            btn.disabled = false;
        });
    }

    function limparQuestaoTela(mensagem) {
        document.getElementById('enunciado').textContent = mensagem;
        document.getElementById('alternativa_a').textContent = '';
        document.getElementById('alternativa_b').textContent = '';
        document.getElementById('alternativa_c').textContent = '';
        document.getElementById('alternativa_d').textContent = '';

        document.querySelectorAll('.quiz-option-btn').forEach(btn => {
            btn.disabled = true;
            btn.classList.remove('is-correct', 'is-wrong');
        });
    }

    function exibirQuestao(indice) {
        const q = questoes[indice];

        document.getElementById('enunciado').textContent = q.enunciado;
        document.getElementById('alternativa_a').textContent = q.alternativa_a;
        document.getElementById('alternativa_b').textContent = q.alternativa_b;
        document.getElementById('alternativa_c').textContent = q.alternativa_c;
        document.getElementById('alternativa_d').textContent = q.alternativa_d;

        respostaCorreta = q.resposta_correta;
        bloqueado = false;

        limparEstadoAlternativas();
        atualizarNivel();
        atualizarPontuacao();
        atualizarVidas();
    }

    function marcarRespostaVisual(letraClicada, resposta) {
        const botaoClicado = document.querySelector(`.quiz-option-btn[data-alt="${letraClicada}"]`);
        const botaoCorreto = document.querySelector(`.quiz-option-btn[data-alt="${resposta}"]`);

        if (botaoCorreto) {
            botaoCorreto.classList.add('is-correct');
        }

        if (botaoClicado && letraClicada !== resposta) {
            botaoClicado.classList.add('is-wrong');
        }

        document.querySelectorAll('.quiz-option-btn').forEach(btn => {
            btn.disabled = true;
        });
    }

    function mostrarModalDerrota() {
        localStorage.setItem('quiz_perdeu', '1');

        const modal = new bootstrap.Modal(document.getElementById('modalDerrota'), {
            backdrop: 'static',
            keyboard: false
        });

        modal.show();
    }

    function mostrarModalVitoria() {
        localStorage.setItem('quiz_vitoria', '1');

        salvarRanking(pontos, function () {
            const modalVitoria = new bootstrap.Modal(document.getElementById('modalVitoria'), {
                backdrop: 'static',
                keyboard: false
            });

            modalVitoria.show();
        });
    }

    function avancarParaProximaQuestao() {
        indiceAtual++;
        nivel++;

        if (indiceAtual < questoes.length) {
            exibirQuestao(indiceAtual);
        } else {
            mostrarModalVitoria();
        }
    }

    function alternativaClickHandler(letra) {
        if (bloqueado) return;

        bloqueado = true;

        const resposta = (respostaCorreta || '').trim().toLowerCase();
        const letraClicada = (letra || '').trim().toLowerCase();

        marcarRespostaVisual(letraClicada, resposta);

        if (letraClicada === resposta) {
            pontos += 100;

            setTimeout(() => {
                avancarParaProximaQuestao();
            }, 700);
        } else {
            vidas--;
            atualizarVidas();

            setTimeout(() => {
                if (vidas <= 0) {
                    mostrarModalDerrota();
                } else {
                    avancarParaProximaQuestao();
                }
            }, 700);
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

    function limparQuizFlags() {
        localStorage.removeItem('quiz_perdeu');
        localStorage.removeItem('quiz_vitoria');
    }

    function getSerieFromUrl() {
        const params = new URLSearchParams(window.location.search);
        return params.get('grade');
    }

    document.addEventListener('DOMContentLoaded', function () {
        indiceAtual = 0;
        nivel = 1;
        pontos = 0;
        vidas = vidasMaximas;
        atualizarVidas();

        const grade = getSerieFromUrl();

        if (grade) {
            fetch(`/game/questions-by-grade?grade=${encodeURIComponent(grade)}`)
                .then(response => response.json())
                .then(data => {
                    if (Array.isArray(data) && data.length > 0) {
                        questoes = data;
                        indiceAtual = 0;
                        nivel = 1;
                        pontos = 0;
                        vidas = vidasMaximas;
                        exibirQuestao(indiceAtual);
                    } else {
                        limparQuestaoTela('Nenhuma questão encontrada para esta série.');
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar questões:', error);
                    limparQuestaoTela('Erro ao buscar questões.');
                });
        } else {
            limparQuestaoTela('Nenhuma série informada na URL.');
        }

        document.querySelectorAll('.quiz-option-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                alternativaClickHandler(this.dataset.alt);
            });
        });

        const btnVoltarMenu = document.getElementById('btnVoltarMenu');
        if (btnVoltarMenu) {
            btnVoltarMenu.addEventListener('click', limparQuizFlags);
        }

        const btnVoltarMenuVitoria = document.getElementById('btnVoltarMenuVitoria');
        if (btnVoltarMenuVitoria) {
            btnVoltarMenuVitoria.addEventListener('click', limparQuizFlags);
        }

        const btnRankingVitoria = document.getElementById('btnRankingVitoria');
        if (btnRankingVitoria) {
            btnRankingVitoria.addEventListener('click', limparQuizFlags);
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>