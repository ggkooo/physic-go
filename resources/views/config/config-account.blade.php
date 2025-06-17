<div class="container bg-light w-75 border rounded">
    <form action="{{ route('config.account.update') }}" method="POST" class="py-3 px-2">
        @csrf
        <div class="row d-flex my-2">
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
        <div class="row d-flex my-2">
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
        <div class="row d-flex my-2">
            <div class="col-12 col-md-4 col-lg-4">
                <a href="/home" class="w-100 btn btn-dark py-3" type="button"><i class="bi bi-arrow-return-left"></i> VOLTAR</a>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <button class="w-100 btn btn-danger py-3" type="button"><i class="bi bi-lock"></i> ALTERAR SENHA</button>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <button class="w-100 btn btn-dark py-3" type="submit">SALVAR</button>
            </div>
        </div>
    </form>
</div>

<footer class="text-center fixed mb-3 mt-3">
    <a href="https://www.unijui.edu.br/" target="_blank"><img src="{{ asset('assets/img/unijui_branco.png') }}"
            alt="Unijuí" width="150" class="img-fluid"></a>
</footer>