@include('admin.head')

<body class="container">

    <div class="content">

        <div class="d-flex justify-content-center mb-5 mt-3">
            <img src="{{ asset('assets/img/logo.png') }}" alt="" width="200" class="img-fluid mt-5">
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
                                <label for="name" class="form-label">Nome:</label>
                                <input type="text" class="form-control has-validation" id="name" name="name"
                                    placeholder="Digite seu nome completo">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="exemplo@dominio.com">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="user_password" name="user_password"
                                    placeholder="Crie uma senha segura">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirmação de Senha:</label>
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password" placeholder="Digite a senha novamente">
                                @error('confirm_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="cadastro" class="form-label">Tipo de cadastro:</label>
                            <select class="form-control" id="tipo_cadastro" name="tipo_cadastro">
                                <option value="" disabled selected>Selecione</option>
                                <option value="aluno">Aluno</option>
                                <option value="professor">Professor</option>
                            </select>
                            @error('tipo_cadastro')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="input-group">
                            <button type="submit" class="btn btn-danger w-100">Cadastrar</button>
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