<div class="d-flex flex-column align-items-center mt-4">
    <div class="col-10 col-md-3 mb-4">
        <a href="{{ route('game.new') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">NOVO JOGO</a>
    </div>
    <div class="col-10 col-md-3 mb-4">
         <a href="{{ route('game.students-ranking') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">RANKING ALUNO</a>
    </div>
    <div class="col-10 col-md-3 mb-4">
        <a href="{{ route('game.schools-ranking') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">RANKING ESCOLA</a>
    </div>
    <div class="col-10 col-md-3 mb-4">
         <a href="{{ route('game.rules') }}"><button class="btn btn-danger w-100 p-3 btn-default btn-raise">REGRAS</button></a>
    </div>
    <div class="row">
        <a href="{{ route('home') }}"
            class="btn-exit text-decoration-none text-white w-100 p-1 position-relative d-inline-block overflow-hidden mt-4 mb-2">
            <i class="bi bi-arrow-left icon" style="font-size: 20px; margin-top: 2px;"></i>
            <span class="exit-text" style="font-size: 18px;">Voltar</span>
        </a>
    </div>
</div>
