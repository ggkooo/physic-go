<div class="row col-md-12 text-white mb-2">
    <h3>Escolas</h3>
</div>

<div class="card border">
    <div class="card-header fw-bold d-flex justify-content-between">
        <div>Escolas Cadastradas</div>
        <div><a href="/management/schoolsRegister" class="btn btn-sm btn-danger">Novo Cadastro</a></div>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table id="table" class="table table-light table-bordered table-hover table-striped table-sm mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Escola</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th width="100px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schools as $index => $school)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $school->nome_escola }}</td>
                            <td>{{ $school->state }}</td>
                            <td>{{ $school->city }}</td>
                            <td>
                                <a class="btn btn-secondary btn-sm" href="{{ route('management.schools.edit', $school->id) }}" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a class="btn btn-secondary btn-sm" href="#" title="Alunos">
                                    <i class="bi bi-person-fill"></i>
                                </a>
                                <form action="{{ route('management.schools.remove', $school->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary btn-sm" title="Remover" onclick="return confirm('Tem certeza que deseja remover esta escola?');">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Nenhuma escola cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <th>#</th>
                    <th>Escola</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th width="100px">Ações</th>
                </tfoot>
            </table>
        </div>

    </div>
</div>