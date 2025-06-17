<div class="d-flex flex-column align-items-center mt-4">
    <div class="col-md-10 d-flex justify-content-between">

        <div class="col-md-6 p-3">
            <div class="card card-contact mb-4 p-2">
                <div class="card-body d-flex justify-content-center">
                    <div class="row col-md-12">
                        <span class="mb-3">Desenvolvedores</span>

                        <div class="mb-3">
                            <div>Cássia Polleto</div>
                            <a href="mailto:cassiapolleto@gmail.com"
                                class="text-email text-decoration-none d-block small">cassiapolleto@gmail.com</a>
                        </div>

                        <div class="mb-3">
                            <div>Giordano Berwig</div>
                            <a href="mailto:giordanoberwig@proton.me"
                                class="text-email text-decoration-none d-block small">giordanoberwig@proton.me</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-contact mb-4 p-2">
                <div class="card-body d-flex justify-content-center">
                    <div class="row col-md-12">
                        <span class="mb-3">Professor Coordenador</span>

                        <div class="mb-3">
                            <div>Edson Padoin</div>
                            <a href="mailto:padoin@unijui.edu.br"
                                class="text-email text-decoration-none d-block small">padoin@unijui.edu.br</a>
                        </div>

                        <div class="mb-3">
                            <div>Barbara Gundel</div>
                            <a href="mailto:barbara.gundel@unijui.edu.br"
                                class="text-email text-decoration-none d-block small">barbara.gundel@unijui.edu.br</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 p-3">
            <div class="card card-border mb-4">
                <div class="card-body d-flex justify-content-center p-4">
                    <div class="row">

                        <div class="col-sm-12 mb-3 mt-2 text-center">
                            Entre em Contato
                        </div>


                        <div class="col-sm-12 mb-3 mt-3">
                            <form action="#" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control @error('user_name') is-invalid @enderror"
                                                    id="floatingInputName" name="user_name" placeholder=""
                                                    value="{{ old('user_name') }}">
                                                <label for="floatingInputName">Nome</label>
                                            </div>
                                            @error('user_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <input type="email"
                                                    class="form-control @error('user_email') is-invalid @enderror"
                                                    id="floatingInputEmail" name="user_email" placeholder=""
                                                    value="{{ old('user_email') }}">
                                                <label for="floatingInputEmail">Email</label>
                                            </div>
                                            @error('user_email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control @error('message') is-invalid @enderror"
                                                    id="floatingInputMessage" name="message" placeholder="Sua mensagem"
                                                    style="height: 170px">{{ old('message') }}</textarea>
                                                <label for="floatingInputMessage">Mensagem</label>
                                            </div>
                                            @error('message')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="input-group">
                                        <button type="submit"
                                            class="btn btn-danger btn-default w-100 p-2">Enviar</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <a href="/home"
            class="btn-exit text-decoration-none text-white w-100 p-1 position-relative d-inline-block overflow-hidden mt-4 mb-3">
            <i class="bi bi-arrow-left icon" style="font-size: 20px; margin-top: 2px;"></i>
            <span class="exit-text" style="font-size: 18px;">Voltar</span>
        </a>
    </div>

</div>


<footer class="text-center fixed mb-3 mt-4">
    <a href="https://www.unijui.edu.br/" target="_blank"><img src="{{ asset('assets/img/unijui_branco.png') }}"
            alt="Unijuí" width="150" class="img-fluid"></a>
</footer>