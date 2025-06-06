<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="card col-md-5 card-border col-11 p-3">
        <div class="card-body">

            <div class="row text-center mt-2 mb-4">
                <h5 class="">Cadastro de Usuário</h5>
            </div>

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="row mt-1">
                    <div class="col position-relative">
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                    id="floatingInputName" name="user_name" placeholder="John Doe"
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
                                <input type="email" class="form-control @error('user_email') is-invalid @enderror"
                                    id="floatingInputEmail" name="user_email" placeholder="john@doe.com"
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
                                <input type="password" class="form-control @error('user_password') is-invalid @enderror"
                                    id="floatingInputPassword" name="user_password" placeholder="********">
                                <label for="floatingInputPassword">Senha</label>
                            </div>
                            @error('user_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="password"
                                    class="form-control @error('user_confirm_password') is-invalid @enderror"
                                    id="floatingInputConfirmPassword" name="user_confirm_password"
                                    placeholder="********">
                                <label for="floatingInputConfirmPassword">Confirmar senha</label>
                            </div>
                            @error('user_confirm_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <select class="form-select form-select-sm py-2 @error('user_account_type') is-invalid @enderror"
                            id="user_account_type" name="user_account_type" aria-label="Selecione um tipo de cadastro"
                            value="{{ old('user_account_type') }}">
                            <option selected disabled>Selecione o tipo de conta</option>
                            <option value="student">Aluno</option>
                            <option value="teacher">Professor</option>
                        </select>
                        @error('user_account_type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="input-group">
                        <button type="submit" class="btn btn-danger btn-default w-100 p-2">Registrar-se</button>
                    </div>
                </div>

                <div class="row m-2">
                    <div class="d-flex justify-content-center mt-4">
                        <small class="form-text text-dark">
                           Já possui uma conta? <a class="text-danger" href="/users/login">Entrar</a>
                        </small>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>