<div class="d-flex flex-column align-items-center mt-4">
    <div class="col-md-9">
        <div class="d-flex justify-content-center mb-4">
            <h5>ENSINO FUNDAMENTAL</h5>
        </div>
        <div class="d-flex flex-column align-items-center mt-4">
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('study.sixth') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">6º ANO</a>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('study.seventh') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">7º ANO</a>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('study.eighth') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">8º ANO</a>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <a href="{{ route('study.ninth') }}" class="btn btn-danger w-100 p-3 btn-default btn-raise">9º ANO</a>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{ route('study') }}"
            class="btn-exit text-decoration-none text-white w-100 p-1 position-relative d-inline-block overflow-hidden mt-4 mb-2">
            <i class="bi bi-arrow-left icon" style="font-size: 20px; margin-top: 2px;"></i>
            <span class="exit-text" style="font-size: 18px;">Voltar</span>
        </a>
    </div>
</div>
