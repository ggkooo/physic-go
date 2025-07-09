<div class="d-flex flex-column align-items-center mt-2">
    <div class="col-md-8 d-flex justify-content-center">

        <div class="col-md-12 p-3">
            <div class="card card-border mb-4">
                <div class="card-body d-flex justify-content-center p-4">
                    <div class="row">

                        <div class="col-sm-12 mb-3 mt-2 text-center">
                            Configurações do Usuário
                        </div>

                        <form action="#" method="POST">
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
                                        <button class="btn btn-default btn-secondary w-100 p-3" type="button">
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
        <a href="/home"
            class="btn-exit text-decoration-none text-white w-100 p-1 position-relative d-inline-block overflow-hidden mt-4 mb-3">
            <i class="bi bi-arrow-left icon" style="font-size: 20px; margin-top: 2px;"></i>
            <span class="exit-text" style="font-size: 18px;">Voltar</span>
        </a>
    </div>

</div>

<script src="{{ asset('assets/js/config-account-mask.js') }}"></script>
<script src="{{ asset('assets/js/api-states-cities.js') }}"></script>