@if(session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="toastSuccess" class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            var toastEl = document.getElementById('toastSuccess');
            if (toastEl) {
                var toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                toast.hide();
            }
        }, 4000);
    </script>
@endif

<div class="row col-md-12 text-white mb-2">
    <h3>Escolas</h3>
</div>

<div class="card border">
    <div class="card-header fw-bold d-flex justify-content-between">
        <div>Escolas Cadastradas</div>
        <div><a href="{{ route('management.schools.register') }}" class="btn btn-sm btn-danger">Novo Cadastro</a></div>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-3 d-flex align-items-center" action="{{ route('management.schools') }}">
            <label for="limit" class="me-2 mb-0">Mostrar</label>
            <select name="limit" id="limit" class="form-select form-select-sm w-auto me-2" onchange="this.form.submit()">
                <option value="5" {{ request('limit') == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                <option value="all" {{ request('limit') == 'all' ? 'selected' : '' }}>Todos</option>
            </select>
            <span>escolas</span>
        </form>
        <div class="table-responsive">
            <table class="table table-light table-bordered table-hover table-striped table-sm mb-0">
                @if(isset($schools) && count($schools))
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
                        @foreach($schools as $school)
                            <tr>
                                <td>{{ $school->id }}</td>
                                <td>{{ $school->school_name }}</td>
                                <td>{{ $school->state }}</td>
                                <td>{{ $school->city }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <a class="btn btn-secondary btn-sm" href="{{ route('management.schools.edit', $school->id) }}" title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="btn btn-secondary btn-sm" href="#" title="Alunos">
                                            <i class="bi bi-person-fill"></i>
                                        </a>
                                        <form action="{{ route('management.schools.remove', $school->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-secondary btn-sm" title="Remover">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Escola</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th width="100px">Ações</th>
                        </tr>
                    </tfoot>
                @else
                    <div class="alert alert-danger text-center m-3" role="alert">
                        Nenhuma escola cadastrada!
                    </div>
                @endif
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <div class="text-muted small">
                @if(method_exists($schools, 'total') && $schools->total() > 0)
                    Mostrando {{ $schools->firstItem() }} a {{ $schools->lastItem() }} de {{ $schools->total() }} resultados
                @else
                    Nenhum resultado encontrado
                @endif
            </div>
            <div class="pagination-container">
                @if(method_exists($schools, 'links'))
                    {{ $schools->links('pagination::bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
</div>
