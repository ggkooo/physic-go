<div class="row col-md-12 text-white mb-2">
    <h3>Séries</h3>
</div>

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

<div class="card border">
    <div class="card-header fw-bold d-flex justify-content-between">
        <div>Registros Cadastrados</div>
        <div>
            <a class="btn btn-danger btn-sm" href="{{ route('management.grades.register') }}" role="button">
                <i class="bi bi-plus-lg"></i> Novo
            </a>
        </div>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-3 d-flex align-items-center" action="{{ route('management.grades') }}">
            <label for="limit" class="me-2 mb-0">Mostrar</label>
            <select name="limit" id="limit" class="form-select form-select-sm w-auto me-2" onchange="this.form.submit()">
                <option value="5" {{ request('limit') == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                <option value="all" {{ request('limit') == 'all' ? 'selected' : '' }}>All</option>
            </select>
            <span>grades</span>
        </form>
        <div class="table-responsive">
            <table class="table table-light table-bordered table-hover table-striped table-sm mb-0">
                @if(isset($grades) && count($grades))
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Situação</th>
                            <th width="200px">Data Cadastro</th>
                            <th width="100px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grades as $grade)
                            <tr>
                                <td>{{ $grade->id }}</td>
                                <td>{{ $grade->name }}</td>
                                <td>{{ $grade->status === 'active' ? 'Ativo' : 'Inativo' }}</td>
                                <td>{{ $grade->created_at ? $grade->created_at->format('d/m/Y H:i') : '' }}</td>
                                <td class="d-flex justify-content-center gap-1">
                                    <a class="btn btn-secondary btn-sm" href="{{ route('management.grades.edit', $grade->id) }}" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('management.grades.remove', $grade->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-secondary btn-sm" title="Remover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Data Cadastro</th>
                            <th>Nome</th>
                            <th>Situação</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                @else
                    <div class="alert alert-danger text-center m-3" role="alert">
                        Nenhuma grade cadastrada!
                    </div>
                @endif
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <div class="text-muted small">
                @if(method_exists($grades, 'total'))
                    @if($grades->total() > 0)
                        Mostrando {{ $grades->firstItem() }} a {{ $grades->lastItem() }} de {{ $grades->total() }} resultados
                    @else
                        Nenhum resultado encontrado
                    @endif
                @else
                    @if($grades->count() > 0)
                        Mostrando {{ $grades->count() }} resultado(s)
                    @else
                        Nenhum resultado encontrado
                    @endif
                @endif
            </div>
            <div class="pagination-container">
                @if(method_exists($grades, 'getUrlRange'))
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            {{-- Previous Page Link --}}
                            @if ($grades->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $grades->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif
                            {{-- Pagination Elements --}}
                            @foreach ($grades->getUrlRange(1, $grades->lastPage()) as $page => $url)
                                @if ($page == $grades->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                            {{-- Next Page Link --}}
                            @if ($grades->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $grades->nextPageUrl() }}" rel="next">&raquo;</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>
