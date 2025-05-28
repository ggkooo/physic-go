@include('admin.head')

<body class="container">

    <div class="content">

        <div class="d-flex justify-content-center mb-4 mt-5">
            <img src="{{ asset('assets/img/logo.png') }}" alt="" width="380" class="img-fluid mt-5">
        </div>

        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-5 col-10">

                <form action="#">

                    <div class="row mt-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email" aria-label="Email" name="email"
                                id="email">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Senha" aria-label="Senha"
                                name="password" id="password">
                            <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <i class="bi bi-eye-fill" id="iconEye"></i>
                            </span>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="input-group">
                            <button type="submit" class="btn btn-danger w-100">Entrar</button>
                        </div>
                    </div>

                </form>

                <div class="row mt-3">
                    <div class="d-flex justify-content-center mt-5">
                        <small class="form-text text-light">
                            <a class="a-login" href="#">Esqueci minha senha</a>
                        </small>
                    </div>

                    <div class="d-flex justify-content-center mt-2 mb-3">
                        <small class="form-text text-light">
                            Não tem uma conta? <a class="a-login" href="/users/register">Cadastre-se</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-5 text-center fixed">
            <a href="https://www.unijui.edu.br/" target="_blank"><img src="{{ asset('assets/img/unijui_branco.png') }}" alt="Unijuí" width="190" class="img-fluid"></a>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const iconEye = document.getElementById('iconEye');

        togglePassword.addEventListener('click', () => {
            const type = password.type === 'password' ? 'text' : 'password';
            password.type = type;

            iconEye.classList.toggle('bi-eye-fill');
            iconEye.classList.toggle('bi-eye-slash-fill');
        });
    </script>

</body>

</html>