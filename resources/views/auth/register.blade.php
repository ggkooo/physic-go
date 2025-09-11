<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="card col-md-5 card-border col-11 p-3">
        <div class="card-body">
            <div class="row text-center mt-2 mb-4">
                <h5 class="">Cadastro de Usuário</h5>
            </div>
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <div class="row mt-3 m-2">
                    <label for="email" class="form-label fw-bold">Nome</label>
                    <div class="position-relative">
                        <i class="bi bi-person position-absolute top-50 translate-middle-y ms-3 text-secondary fs-4"></i>
                        <input type="text" class="form-control ps-5 p-2 @error('name') is-invalid @enderror" placeholder="Digite seu nome"
                            name="name" id="name">
                    </div>
                    @error('name')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mt-3 m-2">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <div class="position-relative">
                        <i class="bi bi-at position-absolute top-50 translate-middle-y ms-3 text-secondary fs-4"></i>
                        <input type="text" class="form-control ps-5 p-2 @error('email') is-invalid @enderror" placeholder="Digite seu email"
                            name="email" id="email">
                    </div>
                    @error('email')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mt-3 m-2">
                    <label for="password" class="form-label fw-bold">Senha</label>
                    <div class="position-relative">
                        <i
                            class="bi bi-lock-fill position-absolute top-50 translate-middle-y ms-3 text-secondary fs-5"></i>
                        <input type="password" class="form-control ps-5 p-2  @error('password') is-invalid @enderror" placeholder="Digite sua senha"
                            name="password" id="password">
                        <span class="position-absolute top-50 end-0 translate-middle-y me-4" style="cursor: pointer;"
                            id="togglePassword">
                            <i class="bi bi-eye-fill" id="iconEye"></i>
                        </span>
                    </div>
                    @error('password')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mt-3 m-2 mb-4">
                    <label for="password" class="form-label fw-bold">Confirmar Senha</label>
                    <div class="position-relative">
                        <i
                            class="bi bi-lock-fill position-absolute top-50 translate-middle-y ms-3 text-secondary fs-5"></i>
                        <input type="password" class="form-control ps-5 p-2  @error('password_confirmation') is-invalid @enderror" placeholder="Confirme sua senha"
                            name="password_confirmation" id="password_confirmation">
                    </div>
                    @error('confirm_password')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>
                {{-- REMOVER A SELEÇÃO DO TIPO DE CONTA! --}}
                <div class="row">
                    <div class="col mb-3 mx-3">
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
                           Já possui uma conta? <a class="text-danger" href="{{ route('login') }}">Entrar</a>
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

<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const iconEye = document.getElementById('iconEye');

    togglePassword.addEventListener('click', () => {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        confirmPassword.type = type;

        iconEye.classList.toggle('bi-eye-fill');
        iconEye.classList.toggle('bi-eye-slash-fill');
    });
</script>
