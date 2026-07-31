<div class="container d-flex align-items-center justify-content-center py-4">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-xl-9">

            <div id="loadingWrapper">
                <div class="home-panel">
                    <div class="home-panel-content text-center">
                        <div class="home-icon mb-4">
                            <i class="bi bi-hourglass-split"></i>
                        </div>

                        <h1 class="home-title mb-3">Carregando questões...</h1>
                        <p class="home-subtitle mb-0">
                            Aguarde um instante enquanto preparamos o jogo.
                        </p>
                    </div>
                </div>
            </div>

            <div id="quizWrapper" class="hide">
                <div class="home-panel">
                    <div class="home-panel-content">

                        <div class="quiz-status-bar mb-4">
                            <div class="quiz-status-item">
                                <span class="quiz-status-label">Nível</span>
                                <strong id="nivel" class="quiz-status-value">Nível 1</strong>
                            </div>

                            <div class="quiz-status-item text-center">
                                <span class="quiz-status-label">Tentativas</span>

                                <div id="vidasContainer" class="quiz-lives mt-2 d-flex justify-content-center"
                                    aria-label="Vidas restantes">
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

                            <button type="button" class="quiz-option-btn hide" data-alt="e" id="option_btn_e">
                                <span class="quiz-option-letter">E</span>
                                <span id="alternativa_e" class="quiz-option-text"></span>
                            </button>
                        </div>

                        <div id="hintBox" class="hint-box hide">
                            <div class="d-flex align-items-start gap-3">
                                <div class="icon-box">
                                    <i class="bi bi-lightbulb-fill text-warning"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 text-warning fw-bold">Dica</h6>
                                    <p id="hintText" class="mb-0"></p>
                                </div>
                            </div>
                        </div>

                        <div class="quiz-footer mt-4">
                            <div class="quiz-footer-icons">
                                <button type="button" class="quiz-icon-btn" id="btnHint" title="Dica">
                                    <i class="bi bi-lightbulb-fill"></i>
                                </button>
                                <button type="button" class="quiz-icon-btn" id="btnSkipQuestion" title="Trocar questão">
                                    <i class="bi bi-arrow-left-right"></i>
                                </button>
                            </div>

                            <div class="text-md-end">
                                <a href="{{ route('game.menu') }}" id="btnDesistir"
                                    class="quiz-quit-btn text-decoration-none">
                                    Desistir
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div id="emptyQuestionsWrapper" class="hide">
                <div class="home-panel">
                    <div class="home-panel-content text-center">
                        <div class="home-icon mb-5">
                            <i class="bi bi-exclamation-circle-fill"></i>
                        </div>

                        <h1 class="home-title mb-3">Nada por aqui ainda 👀</h1>
                        <p class="home-subtitle mb-5" id="emptyQuestionsText">
                            Essa série ainda não tem questões cadastradas. Que tal escolher outra enquanto isso?
                        </p>

                        <a href="{{ route('game.new') }}" class="btn home-start-btn">
                            Escolher outra série
                        </a>

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
    const questionsUrl = "{{ route('game.questionsBySerie', ['grade' => $grade->id]) }}";
    const gradeId = "{{ $grade->id }}";
</script>

<script>
    let questoes = [];
    let indiceAtual = 0;
    let respostaCorreta = '';
    let bloqueado = false;
    let nivel = 1;
    let pontos = 0;
    let vidas = 3;
    let questoesComDicaUsada = [];

    const vidasMaximas = 3;
    const totalPerguntasJogo = 5;

    let perguntasRespondidas = 0;

    const maxDicas = 3;
    const maxTrocas = 3;
    let dicasRestantes = maxDicas;
    let trocasRestantes = maxTrocas;

    const quizStateKey = `quiz_state_grade_${gradeId}`;

    if (localStorage.getItem('quiz_perdeu') === '1' || localStorage.getItem('quiz_vitoria') === '1') {
        localStorage.removeItem('quiz_perdeu');
        localStorage.removeItem('quiz_vitoria');
        localStorage.removeItem(quizStateKey);
        window.location.href = '/game/menu';
    }

    function esconderLoading() {
        const loadingWrapper = document.getElementById('loadingWrapper');

        if (loadingWrapper) {
            loadingWrapper.classList.add('hide');
        }
    }

    function salvarEstadoQuiz() {
        const estado = {
            questoes,
            indiceAtual,
            respostaCorreta,
            nivel,
            pontos,
            vidas,
            perguntasRespondidas,
            dicasRestantes,
            trocasRestantes,
            questoesComDicaUsada
        };

        localStorage.setItem(quizStateKey, JSON.stringify(estado));
    }

    function carregarEstadoQuiz() {
        const estadoSalvo = localStorage.getItem(quizStateKey);

        if (!estadoSalvo) {
            return false;
        }

        try {
            const estado = JSON.parse(estadoSalvo);

            questoes = Array.isArray(estado.questoes) ? estado.questoes : [];
            indiceAtual = Number.isInteger(estado.indiceAtual) ? estado.indiceAtual : 0;
            respostaCorreta = estado.respostaCorreta || '';
            nivel = Number.isInteger(estado.nivel) ? estado.nivel : 1;
            pontos = Number.isInteger(estado.pontos) ? estado.pontos : 0;
            vidas = Number.isInteger(estado.vidas) ? estado.vidas : vidasMaximas;
            perguntasRespondidas = Number.isInteger(estado.perguntasRespondidas) ? estado.perguntasRespondidas : 0;
            dicasRestantes = Number.isInteger(estado.dicasRestantes) ? estado.dicasRestantes : maxDicas;
            trocasRestantes = Number.isInteger(estado.trocasRestantes) ? estado.trocasRestantes : maxTrocas;
            questoesComDicaUsada = Array.isArray(estado.questoesComDicaUsada) ? estado.questoesComDicaUsada : [];

            return questoes.length > 0;
        } catch (error) {
            console.error('Erro ao carregar estado do quiz:', error);
            localStorage.removeItem(quizStateKey);
            return false;
        }
    }

    function limparEstadoQuizSalvo() {
        localStorage.removeItem(quizStateKey);
    }

    function atualizarNivel() {
        document.getElementById('nivel').textContent = 'Nível ' + nivel;
    }

    function atualizarPontuacao() {
        document.getElementById('pontuacao').textContent = 'Pontuação: ' + pontos;
    }

    function atualizarVidas() {
        const vidasContainer = document.getElementById('vidasContainer');

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
            btn.style.visibility = 'visible';
            btn.style.pointerEvents = 'auto';
        });

        const botaoE = document.getElementById('option_btn_e');
        const alternativaE = document.getElementById('alternativa_e');

        if (botaoE && alternativaE && alternativaE.textContent.trim() === '') {
            botaoE.classList.add('hide');
        }
    }

    function limparQuestaoTela(mensagem) {
        document.getElementById('enunciado').textContent = mensagem;
        document.getElementById('alternativa_a').textContent = '';
        document.getElementById('alternativa_b').textContent = '';
        document.getElementById('alternativa_c').textContent = '';
        document.getElementById('alternativa_d').textContent = '';
        document.getElementById('alternativa_e').textContent = '';

        document.querySelectorAll('.quiz-option-btn').forEach(btn => {
            btn.disabled = true;
            btn.classList.remove('is-correct', 'is-wrong');
            btn.style.visibility = 'visible';
            btn.style.pointerEvents = 'none';
        });

        esconderDica();
        atualizarEstadoBotoesAcao();
    }

    function esconderDica() {
        const hintBox = document.getElementById('hintBox');
        const hintText = document.getElementById('hintText');

        if (hintBox) {
            hintBox.classList.add('hide');
            hintBox.classList.remove('show');
        }

        if (hintText) {
            hintText.textContent = '';
        }
    }

    function mostrarDica(texto) {
        const hintBox = document.getElementById('hintBox');
        const hintText = document.getElementById('hintText');

        if (!hintBox || !hintText) return;

        hintText.innerHTML = texto;
        hintBox.classList.remove('hide');
        hintBox.classList.add('show');
    }

    function atualizarEstadoBotoesAcao() {
        const btnHint = document.getElementById('btnHint');
        const btnSkipQuestion = document.getElementById('btnSkipQuestion');

        if (btnHint) {
            const semDicas = dicasRestantes <= 0;
            btnHint.disabled = bloqueado || semDicas;
            btnHint.style.opacity = btnHint.disabled ? '0.45' : '1';
            btnHint.style.pointerEvents = btnHint.disabled ? 'none' : 'auto';
            btnHint.title = semDicas ? 'Sem dicas restantes' : `Dica (${dicasRestantes} restantes)`;
        }

        if (btnSkipQuestion) {
            const semTrocas = trocasRestantes <= 0;
            const semQuestoesParaTrocar = !buscarQuestaoNaoUsadaParaTroca();

            btnSkipQuestion.disabled = bloqueado || semTrocas || semQuestoesParaTrocar;
            btnSkipQuestion.style.opacity = btnSkipQuestion.disabled ? '0.45' : '1';
            btnSkipQuestion.style.pointerEvents = btnSkipQuestion.disabled ? 'none' : 'auto';

            if (semTrocas) {
                btnSkipQuestion.title = 'Sem trocas restantes';
            } else if (semQuestoesParaTrocar) {
                btnSkipQuestion.title = 'Não há mais questões disponíveis para troca';
            } else {
                btnSkipQuestion.title = `Trocar questão (${trocasRestantes} restantes)`;
            }
        }
    }

    function obterQuestaoAtual() {
        return questoes[indiceAtual] || null;
    }

    function exibirQuestao(indice) {
        const q = questoes[indice];

        if (!q) {
            limparQuestaoTela('Questão não encontrada.');
            return;
        }

        questionStartedAt = Date.now();

        document.getElementById('enunciado').innerHTML = q.statement;
        document.getElementById('alternativa_a').textContent = q.option_a || '';
        document.getElementById('alternativa_b').textContent = q.option_b || '';
        document.getElementById('alternativa_c').textContent = q.option_c || '';
        document.getElementById('alternativa_d').textContent = q.option_d || '';

        const alternativaE = document.getElementById('alternativa_e');
        const botaoE = document.getElementById('option_btn_e');

        if ((q.option_e || '').trim() !== '') {
            alternativaE.textContent = q.option_e;
            botaoE.classList.remove('hide');
            botaoE.disabled = false;
            botaoE.style.visibility = 'visible';
            botaoE.style.pointerEvents = 'auto';
        } else {
            alternativaE.textContent = '';
            botaoE.classList.add('hide');
        }

        respostaCorreta = (q.correct_option || '').trim().toLowerCase();
        bloqueado = false;

        esconderDica();
        limparEstadoAlternativas();
        atualizarNivel();
        atualizarPontuacao();
        atualizarVidas();
        atualizarEstadoBotoesAcao();
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

        atualizarEstadoBotoesAcao();
    }

    function mostrarModalDerrota() {
        localStorage.setItem('quiz_perdeu', '1');
        limparEstadoQuizSalvo();

        const modal = new bootstrap.Modal(document.getElementById('modalDerrota'), {
            backdrop: 'static',
            keyboard: false
        });

        modal.show();
    }

    function mostrarModalVitoria() {
        localStorage.setItem('quiz_vitoria', '1');
        limparEstadoQuizSalvo();

        salvarRanking(pontos, function () {
            const modalVitoria = new bootstrap.Modal(document.getElementById('modalVitoria'), {
                backdrop: 'static',
                keyboard: false
            });

            modalVitoria.show();
        });
    }

    function avancarParaProximaQuestao() {
        perguntasRespondidas++;
        nivel++;

        if (perguntasRespondidas >= totalPerguntasJogo) {
            salvarEstadoQuiz();
            mostrarModalVitoria();
            return;
        }

        indiceAtual++;

        if (indiceAtual < questoes.length) {
            exibirQuestao(indiceAtual);
            salvarEstadoQuiz();
        } else {
            salvarEstadoQuiz();
            mostrarModalVitoria();
        }
    }

    async function alternativaClickHandler(letra) {
        if (bloqueado) return;

        bloqueado = true;
        atualizarEstadoBotoesAcao();

        const questaoAtual = obterQuestaoAtual();
        const resposta = (respostaCorreta || '').trim().toLowerCase();
        const letraClicada = (letra || '').trim().toLowerCase();

        if (!questaoAtual || !questaoAtual.id) {
            console.error('Não foi possível identificar a questão atual.');
            bloqueado = false;
            atualizarEstadoBotoesAcao();
            return;
        }

        marcarRespostaVisual(letraClicada, resposta);

        try {
            await registerStudentAnswer(
                questaoAtual.id,
                letraClicada
            );
        } catch (error) {
            console.error('Erro ao registrar resposta do aluno:', error);
        }

        if (letraClicada === resposta) {
            pontos += 100;
            salvarEstadoQuiz();

            setTimeout(() => {
                avancarParaProximaQuestao();
            }, 700);
        } else {
            vidas--;
            atualizarVidas();
            salvarEstadoQuiz();

            setTimeout(() => {
                if (vidas <= 0) {
                    mostrarModalDerrota();
                } else {
                    avancarParaProximaQuestao();
                }
            }, 700);
        }
    }

    function usarDica() {
        if (bloqueado || dicasRestantes <= 0) return;

        const questaoAtual = obterQuestaoAtual();
        if (!questaoAtual) return;

        const questaoId = questaoAtual.id ?? `indice_${indiceAtual}`;
        const dicaJaConsumidaNestaQuestao = questoesComDicaUsada.includes(questaoId);

        const dicaTexto = questaoAtual.hint || questaoAtual.tip || questaoAtual.dica || 'Esta questão não possui dica cadastrada.';

        if (!dicaJaConsumidaNestaQuestao) {
            dicasRestantes--;
            questoesComDicaUsada.push(questaoId);
        }

        mostrarDica(dicaTexto);
        atualizarEstadoBotoesAcao();
        salvarEstadoQuiz();
    }

    function buscarQuestaoNaoUsadaParaTroca() {
        const idsEmTela = new Set(
            questoes
                .slice(0, indiceAtual + 1)
                .map(q => q?.id)
                .filter(Boolean)
        );

        const atual = obterQuestaoAtual();
        if (atual?.id) {
            idsEmTela.add(atual.id);
        }

        return questoes.find((q, index) => {
            if (!q || !q.id) return false;
            if (index === indiceAtual) return false;
            return !idsEmTela.has(q.id);
        }) || null;
    }

    function trocarQuestaoAtual() {
        if (bloqueado || trocasRestantes <= 0) return;

        const novaQuestao = buscarQuestaoNaoUsadaParaTroca();
        if (!novaQuestao) return;

        trocasRestantes--;
        questoes[indiceAtual] = novaQuestao;

        exibirQuestao(indiceAtual);
        salvarEstadoQuiz();
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
        limparEstadoQuizSalvo();
    }

    function iniciarNovoQuiz(data) {
        questoes = data;
        indiceAtual = 0;
        respostaCorreta = '';
        bloqueado = false;
        nivel = 1;
        pontos = 0;
        vidas = vidasMaximas;
        perguntasRespondidas = 0;
        dicasRestantes = maxDicas;
        trocasRestantes = maxTrocas;
        questoesComDicaUsada = [];

        mostrarQuiz();
        salvarEstadoQuiz();
        exibirQuestao(indiceAtual);
    }

    function mostrarEstadoSemQuestoes(mensagem = 'Ainda não há questões cadastradas para esta série.') {
        const loadingWrapper = document.getElementById('loadingWrapper');
        const quizWrapper = document.getElementById('quizWrapper');
        const emptyQuestionsWrapper = document.getElementById('emptyQuestionsWrapper');
        const emptyQuestionsText = document.getElementById('emptyQuestionsText');

        if (loadingWrapper) {
            loadingWrapper.classList.add('hide');
        }

        if (quizWrapper) {
            quizWrapper.classList.add('hide');
        }

        if (emptyQuestionsWrapper) {
            emptyQuestionsWrapper.classList.remove('hide');
        }

        if (emptyQuestionsText) {
            emptyQuestionsText.textContent = mensagem;
        }
    }

    function mostrarQuiz() {
        const loadingWrapper = document.getElementById('loadingWrapper');
        const quizWrapper = document.getElementById('quizWrapper');
        const emptyQuestionsWrapper = document.getElementById('emptyQuestionsWrapper');

        if (loadingWrapper) {
            loadingWrapper.classList.add('hide');
        }

        if (quizWrapper) {
            quizWrapper.classList.remove('hide');
        }

        if (emptyQuestionsWrapper) {
            emptyQuestionsWrapper.classList.add('hide');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        atualizarNivel();
        atualizarPontuacao();
        atualizarVidas();
        atualizarEstadoBotoesAcao();

        const estadoCarregado = carregarEstadoQuiz();

        if (estadoCarregado) {
            mostrarQuiz();
            exibirQuestao(indiceAtual);
        } else {
            fetch(questionsUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao buscar questões');
                    }
                    return response.json();
                })
                .then(data => {
                    if (Array.isArray(data) && data.length > 0) {
                        iniciarNovoQuiz(data);
                    } else {
                        limparEstadoQuizSalvo();
                        mostrarEstadoSemQuestoes('Essa série ainda não tem questões cadastradas. Que tal escolher outra enquanto isso?');
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar questões:', error);
                    limparEstadoQuizSalvo();
                    mostrarEstadoSemQuestoes('Não foi possível carregar as questões desta série no momento.');
                });
        }

        document.querySelectorAll('.quiz-option-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                alternativaClickHandler(this.dataset.alt);
            });
        });

        const btnHint = document.getElementById('btnHint');
        if (btnHint) {
            btnHint.addEventListener('click', usarDica);
        }

        const btnSkipQuestion = document.getElementById('btnSkipQuestion');
        if (btnSkipQuestion) {
            btnSkipQuestion.addEventListener('click', trocarQuestaoAtual);
        }

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


    let questionStartedAt = Date.now();

    async function registerStudentAnswer(questionId, selectedOption) {
        const responseTime = Math.max(
            0,
            Math.round((Date.now() - questionStartedAt) / 1000)
        );

        const csrfToken = document.querySelector(
            'meta[name="csrf-token"]'
        )?.getAttribute('content');

        if (!csrfToken) {
            throw new Error('Token CSRF não encontrado na página.');
        }

        const response = await fetch("{{ route('game.save-answer') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                question_id: questionId,
                selected_option: selectedOption,
                response_time_seconds: responseTime
            })
        });

        const data = await response.json();

        if (!response.ok) {
            console.error('Erro retornado pelo Laravel:', data);

            throw new Error(
                data.message || 'Não foi possível registrar a resposta.'
            );
        }

        questionStartedAt = Date.now();

        return data;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>