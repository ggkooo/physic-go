@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Fechar"
        ></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Fechar"
        ></button>
    </div>
@endif

<div class="row col-md-12 text-white mb-2">
    <h3>Usuários</h3>
</div>

<div class="card border">
    <div class="card-header fw-bold d-flex justify-content-between">
        <div>Usuários cadastrados</div>
        <a href="{{ route('management.groups') }}" class="btn btn-primary btn-sm">Gerenciar grupos</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table id="table" class="table table-light table-bordered table-hover table-striped table-sm mb-0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Escola</th>
                        <th>Turma</th>
                        <th>Grupos de acesso</th>
                        <th width="70px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users ?? [] as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->cpf }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->school }}</td>
                            <td>{{ $user->class }}</td>
                            <td>
                                @forelse($user->groups as $group)
                                    <span class="badge bg-primary">{{ $group->name }}</span>
                                @empty
                                    <span class="text-muted">Nenhum grupo</span>
                                @endforelse
                            </td>
                            <td>
                                <a class="btn btn-secondary btn-sm" href="{{ route('management.users.edit', $user->id) }}"
                                    title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('management.users.remove', $user->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Tem certeza que deseja remover este usuário?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Remover">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Escola</th>
                        <th>Turma</th>
                        <th>Grupos de acesso</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>