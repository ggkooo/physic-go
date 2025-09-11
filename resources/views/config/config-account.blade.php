<div class="d-flex flex-column align-items-center mt-2">
    <div class="col-md-8 d-flex justify-content-center">
        <div class="col-md-12 p-3">
            <div class="card card-border mb-4">
                <div class="card-body d-flex justify-content-center p-4">
                    <div class="row">
                        <div class="col-sm-12 mb-3 mt-2 text-center">
                            Configurações do Usuário
                        </div>
                        <form action="{{ route('config.account.update') }}" method="POST">
                            @csrf
                            <div class="col-sm-12 mt-3">
                                <div class="row d-flex">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" value="{{ $user->name ?? '' }}" readonly>
                                            <label for="floatingInput">Nome Completo</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="john@doe.com" value="{{ $user->email ?? '' }}" readonly>
                                            <label for="floatingInput">Email</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="123.456.789-10" value="{{ $user->cpf ?? '' }}" @if($user->cpf) readonly @endif>
                                        <label for="floatingInput">CPF</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="(55) 12345-6789" value="{{ $user->phone ?? '' }}">
                                        <label for="floatingInput">Telefone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex my-2 mb-4">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="hidden" id="user_state" value="{{ $user->state ?? '' }}">
                                        <select class="form-control py-3" id="state" name="state">
                                            <option value="">Selecione o Estado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="hidden" id="user_city" value="{{ $user->city ?? '' }}">
                                        <select class="form-control py-3" id="city" name="city" disabled>
                                            <option value="">Selecione a Cidade</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex my-2">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="school" name="school" placeholder="Escola Nacional" value="{{ $user->school ?? '' }}">
                                        <label for="floatingInput">Escola</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="class" name="class" placeholder="061" value="{{ $user->class ?? '' }}">
                                        <label for="floatingInput">Turma</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-default btn-secondary w-100 p-3" type="button" id="openChangePasswordModal">
                                            <i class="bi bi-lock"></i> ALTERAR SENHA
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-default btn-danger w-100 p-3" type="submit">
                                            SALVAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{ route('home') }}"
            class="btn-exit text-decoration-none text-white w-100 p-1 position-relative d-inline-block overflow-hidden mt-4 mb-3">
            <i class="bi bi-arrow-left icon" style="font-size: 20px; margin-top: 2px;"></i>
            <span class="exit-text" style="font-size: 18px;">Voltar</span>
        </a>
    </div>
</div>

<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Alterar Senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                {{-- CONFIGURAR ENVIO DO FORMULÁRIO --}}
                <form>
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Senha Atual">
                        <label for="current_password">Senha Atual</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nova Senha">
                        <label for="new_password">Nova Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Confirme a Nova Senha">
                        <label for="confirm_new_password">Confirme a Nova Senha</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/config-account-mask.js') }}"></script>
<script src="{{ asset('assets/js/api-states-cities.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var btn = document.getElementById('openChangePasswordModal');
    if (btn) {
        btn.addEventListener('click', function () {
            var modalEl = document.getElementById('changePasswordModal');
            if (modalEl) {
                var modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    }
});
</script>
