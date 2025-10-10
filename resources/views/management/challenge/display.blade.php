<div class="row col-md-12 text-white mb-2">
    <h3>Perguntas</h3>
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
        <div>Desafios Cadastrados</div>
        <div><a href="{{ route('management.challenge.register') }}" class="btn btn-sm btn-danger">Novo Cadastro</a></div>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-3 d-flex align-items-center" action="{{ route('management.challenge') }}">
            <label for="limit" class="me-2 mb-0">Mostrar</label>
            <select name="limit" id="limit" class="form-select form-select-sm w-auto me-2" onchange="this.form.submit()">
                <option value="5" {{ request('limit') == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                <option value="all" {{ request('limit') == 'all' ? 'selected' : '' }}>All</option>
            </select>
            <span>desafios</span>
        </form>
        <div class="table-responsive">
            <table class="table table-light table-bordered table-hover table-striped table-sm mb-0">
                @if(isset($challenges) && count($challenges))
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Enunciado</th>
                            <th>Fonte</th>
                            <th>Gabarito</th>
                            <th width="100px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($challenges as $challenge)
                            <tr>
                                <td>{{ $challenge->id }}</td>
                                <td>{{ Str::limit(strip_tags($challenge->statement), 60) }}</td>
                                <td>{{ $challenge->source }}</td>
                                <td>{{ strtoupper($challenge->correct_alternative) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-secondary btn-sm" href="{{ route('management.challenge.edit', $challenge->id) }}" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <!-- <a class="btn btn-secondary btn-sm" href="#" title="Visualizar">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a class="btn btn-secondary btn-sm" href="#" title="Estatísticas">
                                        <i class="bi bi-bar-chart-fill"></i>
                                    </a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Enunciado</th>
                            <th>Fonte</th>
                            <th>Gabarito</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                @else
                    <div class="alert alert-danger text-center m-3" role="alert">
                        Nenhum desafio cadastrado!
                    </div>
                @endif
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <div class="text-muted small">
                @if(method_exists($challenges, 'total') && $challenges->total() > 0)
                    Mostrando {{ $challenges->firstItem() }} a {{ $challenges->lastItem() }} de {{ $challenges->total() }} resultados
                @else
                    Nenhum resultado encontrado
                @endif
            </div>
            <div class="pagination-container">
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        {{-- Previous Page Link --}}
                        @if(method_exists($challenges, 'onFirstPage') && $challenges->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $challenges->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @if(method_exists($challenges, 'getUrlRange'))
                            @foreach ($challenges->getUrlRange(1, $challenges->lastPage()) as $page => $url)
                                @if ($page == $challenges->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif

                        {{-- Next Page Link --}}
                        @if(method_exists($challenges, 'hasMorePages') && $challenges->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $challenges->nextPageUrl() }}" rel="next">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        if ($.fn.DataTable) {
            if ($.fn.dataTable.isDataTable('#table')) {
                $('#table').DataTable().destroy();
            }
        }
    });
</script>
