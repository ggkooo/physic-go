<div class="row col-md-12 text-white mb-2">
    <h3>Grupos de acesso</h3>
</div>

<div class="card border">
    <div class="card-header fw-bold d-flex justify-content-between align-items-center">
        <span>Grupos cadastrados</span>
        <a href="{{ route('management.groups.create') }}" class="btn btn-primary btn-sm">Novo grupo</a>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-light table-bordered table-hover table-striped table-sm mb-0">
            <thead>
                <tr>
                    <th>Identificador</th>
                    <th>Descrição</th>
                    <th>Usuários</th>
                    <th width="110">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($groups as $group)
                    <tr>
                        <td><code>{{ $group->name }}</code></td>
                        <td>{{ $group->description }}</td>
                        <td>{{ $group->users_count }}</td>
                        <td>
                            <a href="{{ route('management.groups.edit', $group->id) }}" class="btn btn-secondary btn-sm"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('management.groups.remove', $group->id) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Remover este grupo? Os usuários perderão essa permissão.');">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Nenhum grupo cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>