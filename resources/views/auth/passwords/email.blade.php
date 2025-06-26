<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="card col-md-5 card-border col-11 p-3">
        <div class="card-body">

            <div class="row text-center mt-2 mb-4 m-2">
                Informe seu e-mail abaixo para que possamos ajudá-lo a recuperar sua senha.
            </div>

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInputEmail" name="email" placeholder="john@doe.com"
                                    value="{{ old('email') }}">
                                <label for="floatingInputEmail">Email</label>
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="input-group">
                        <button type="submit" class="btn btn-danger btn-default w-100 p-2">Enviar</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>