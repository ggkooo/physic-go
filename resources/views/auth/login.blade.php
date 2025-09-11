<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="card col-md-5 card-border col-12">
        <div class="card-body">
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="row mt-3 m-2">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <div class="position-relative">
                        <i class="bi bi-at position-absolute top-50 translate-middle-y ms-3 text-secondary fs-4"></i>
                        <input type="text" class="form-control ps-5 p-2 @error('email') is-invalid @enderror" placeholder="Digite seu email" name="email" id="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mt-3 m-2">
                    <label for="password" class="form-label fw-bold">Senha</label>
                    <div class="position-relative">
                        <i class="bi bi-lock-fill position-absolute top-50 translate-middle-y ms-3 text-secondary fs-5"></i>
                        <input type="password" class="form-control ps-5 p-2  @error('password') is-invalid @enderror" placeholder="Digite sua senha" name="password" id="password">
                        <span class="position-absolute top-50 end-0 translate-middle-y me-4" style="cursor: pointer;" id="togglePassword">
                            <i class="bi bi-eye-fill" id="iconEye"></i>
                        </span>
                    </div>
                    @error('password')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                     @error('auth_error')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row m-2">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input me-1" id="rememberMe" name="rememberMe">
                            <label for="rememberMe" class="form-check-label small">Lembre de mim</label>
                        </div>
                        <a href="{{ route('password.reset') }}" class="small text-decoration-none text-danger">Esqueceu a
                            senha?</a>
                    </div>
                </div>
                <div class="row mt-4 m-2">
                    <div class="input-group">
                        <button type="submit" class="btn btn-danger btn-default w-100 p-2">Entrar</button>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="d-flex justify-content-center mt-3">
                        <small class="form-text text-dark">
                            Não tem uma conta? <a class="text-danger" href="{{ route('register') }}">Cadastre-se</a>
                        </small>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="d-flex justify-content-center mt-4">
                        <small class="form-text text-dark">
                            Ou entrar com
                        </small>
                    </div>
                </div>
                <div class="row mt-4 mb-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="col-md-12 p-2">
                            <a href="{{ route('google.login') }}" class="btn btn-outline w-100">
                                <i class="bi bi-google me-1"></i> Google
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
