@include('admin.head')

<body class="container">

    <div class="content">

        <div class="d-flex justify-content-center mb-5 mt-3">
            <img src="{{ asset('assets/img/physic-go-logo.png') }}" alt="" width="500" class="img-fluid mt-5">
        </div>

        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-5 col-10">
                <div class="row d-flex text-center justify-content-center mt-3 mb-4">
                    <h4>Cadastro de Usuário</h4>
                </div>
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col position-relative">
                            <div class="mb-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="floatingInputName" name="user_name" placeholder="John Doe" value="{{ old('user_name') }}">
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
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInputEmail" name="user_email" placeholder="john@doe.com" value="{{ old('user_email') }}">
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
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInputPassword" name="user_password" placeholder="********">
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
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInputConfirmPassword" name="user_confirm_password" placeholder="********">
                                    <label for="floatingInputConfirmPassword">Confirmar senha</label>
                                </div>
                                @error('user_confirm_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select class="form-select form-select-sm py-2 mb-3" id="user_account_type" name="user_account_type" aria-label="Selecione um tipo de cadastro" value="{{ old('user_account_type') }}">
                                <option selected disabled>Selecione o tipo de conta</option>
                                <option value="student">Aluno</option>
                                <option value="teacher">Professor</option>
                            </select>
                            @error('register-type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="input-group">
                            <button type="submit" class="btn btn-danger w-100 py-3">Registrar-se</button>
                        </div>
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="d-flex justify-content-center mt-4 mb-3">
                        <small class="form-text text-light">
                            Ja possui uma conta? <a class="a-login" href="/users/login">Entrar</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <footer class="mt-5 text-center fixed">
            <a href="https://www.unijui.edu.br/" target="_blank"><img src="{{ asset('assets/img/unijui_branco.png') }}"
                    alt="Unijuí" width="190" class="img-fluid"></a>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
</body>
</html>
