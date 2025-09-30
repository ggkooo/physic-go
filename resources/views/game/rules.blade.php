<div class="d-flex flex-column align-items-center mt-5">
    <div class="col-md-10 col-11 position-relative mb-4">

        <div class="card-303030 p-5">

            <div class="row mb-4 mt-2">
                <div class="col-12 text-white fw-bold text-center">
                    <h5>REGRAS DO JOGO</h5>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12 text-white text-center">
                    <p>O PhysicGO é um jogo de perguntas e respostas que abrange os principais conteúdos de Física do
                        Ensino Médio,
                        ideal para quem está se preparando para o ENEM, vestibulares ou simplesmente quer revisar Física
                        de forma divertida e interativa!</p>
                    <p>Ao iniciar uma nova partida, você seleciona o nível em que deseja jogar, e as perguntas serão
                        sorteadas automaticamente pelo sistema.
                        A partir daí, é hora de testar seus conhecimentos!</p>
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <div class="col-12 text-danger float-left fw-bold">
                    AJUDAS DISPONÍVEIS
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12 text-white text-left">
                    <p><strong>CARTAS: </strong>Remove duas alternativas incorretas, deixando apenas a correta e uma
                        incorreta. Suas chances de acerto aumentam para 50/50.</p>
                    <p><strong>DICA: </strong>Fornece uma dica sobre como resolver a questão, seja por meio de uma
                        explicação teórica ou uma fórmula importante relacionada ao problema.</p>
                    <p><strong>TROCAR: </strong>Substitui a questão atual por outra do mesmo nível, mas sobre um
                        conteúdo diferente.</p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12 text-white text-center">
                    <p class="fw-bold">IMPORTANTE</p>
                    <p>Cada ajuda pode ser usada apenas uma vez por partida, e não é permitido usar mais de uma ajuda na
                        mesma questão.</p>
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <div class="col-12 text-danger float-left fw-bold">
                    ESTRUTURA DO JOGO
                </div>
            </div>

            <div class="row mb-5 text-left">
                <p>O jogo é dividiso em 4 fases, com nível de dificuldade crescente. A pontuação aumenta a cada fase:
                </p>
                <div class="col-12 text-white">
                    <p><strong>1ª FASE: </strong>5 perguntas de nível fácil | 100 pontos por resposta correta</p>
                    <p><strong>2ª FASE: </strong>5 perguntas de nível médio | 100 pontos por resposta correta</p>
                    <p><strong>3ª FASE: </strong>5 perguntas de nível difícil | 100 pontos por resposta correta</p>
                    <!-- <p><strong>4ª FASE: </strong>1 pergunta de nível difícil (desafio final) | 1.000.000 pontos pela
                        resposta correta</p> -->
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <div class="col-12 text-danger float-left fw-bold">
                    COMO TERMINA UMA PARTIDA?
                </div>
            </div>

            <div class="row mb-2 text-left">
                <p>O PhysicGO pode terminar de 4 formas diferentes:</p>
                <div class="col-12 text-white ">
                    <p><strong>VITÓRIA: </strong>Ao acertar a última questão da 4ª fase | Você recebe 1.000.000 pontos
                        bônus.</p>
                    <p><strong>DERROTA: </strong>Ao errar qualquer questão | Você recebe metade dos pontos conquistados
                        até o momento.</p>
                    <p><strong>DESISTÊNCIA: </strong>Ao optar por não responder uma questão | Você mantém todos os pontos
                        conquistados.</p>
                    <p><strong>INATIVIDADE: </strong>Se ficar inativo por mais de 2 horas | Você não recebe nenhum
                        ponto.</p>
                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <a href="{{ route('game.menu') }}"
            class="btn-exit text-decoration-none text-white w-100 p-1 position-relative d-inline-block overflow-hidden mt-4 mb-1">
            <i class="bi bi-arrow-left icon" style="font-size: 20px; margin-top: 2px;"></i>
            <span class="exit-text" style="font-size: 18px;">Voltar</span>
        </a>
    </div>

</div>