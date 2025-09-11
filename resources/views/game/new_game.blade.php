<div class="d-flex flex-column align-items-center mt-4">
    <div class="col-md-9 mb-2">
        <div class="d-flex justify-content-center mb-4">
            <h5>ENSINO FUNDAMENTAL</h5>
        </div>
        <div class="d-flex flex-column align-items-center mt-4">
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('game.display', ['grade' => '6']) }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">6º ANO</a>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('game.display', ['grade' => '7']) }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">7º ANO</a>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('game.display', ['grade' => '8']) }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">8º ANO</a>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('game.display', ['grade' => '9']) }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">9º ANO</a>
            </div>
        </div>
    </div>
    <div class="col-md-9 mt-4">
        <div class="d-flex justify-content-center mb-4">
            <h5>ENSINO MÉDIO</h5>
        </div>
        <div class="d-flex flex-column align-items-center mt-4 mb-2">
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('game.display', ['grade' => '1']) }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">1º ANO</a>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('game.display', ['grade' => '2']) }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">2º ANO</a>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('game.display', ['grade' => '3']) }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">3º ANO</a>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{ route('game.menu') }}"
            class="btn-exit text-decoration-none text-white w-100 p-1 position-relative d-inline-block overflow-hidden mt-4 mb-2">
            <i class="bi bi-arrow-left icon" style="font-size: 20px; margin-top: 2px;"></i>
            <span class="exit-text" style="font-size: 18px;">Voltar</span>
        </a>
    </div>
</div>
