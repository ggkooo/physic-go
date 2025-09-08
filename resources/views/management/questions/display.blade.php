<div class="row col-md-12 text-white mb-2">
    <h3>Perguntas</h3>
</div>

<div class="card border">
    <div class="card-header fw-bold d-flex justify-content-between">
        <div>Perguntas Cadastradas</div>
        <div><a href="/management/questionsRegister" class="btn btn-sm btn-danger">Novo Cadastro</a></div>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-3 d-flex align-items-center" action="{{ route('management.questions') }}">
            <label for="limit" class="me-2 mb-0">Show</label>
            <select name="limit" id="limit" class="form-select form-select-sm w-auto me-2" onchange="this.form.submit()">
                <option value="5" {{ request('limit') == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                <option value="all" {{ request('limit') == 'all' ? 'selected' : '' }}>All</option>
            </select>
            <span>questions</span>
        </form>
        <div class="table-responsive">
            <table id="table" class="table table-light table-bordered table-hover table-striped table-sm mb-0">
                @if(isset($questions) && count($questions))
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Statement</th>
                            <th>Source</th>
                            <th>Content</th>
                            <th width="100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ Str::limit(strip_tags($question->statement), 60) }}</td>
                                <td>{{ $question->source }}</td>
                                <td>{{ $question->content }}</td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="#" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="btn btn-secondary btn-sm" href="#" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a class="btn btn-secondary btn-sm" href="#" title="Statistics">
                                        <i class="bi bi-bar-chart-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Statement</th>
                            <th>Source</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                @else
                    <div class="alert alert-danger text-center m-3" role="alert">
                        Nenhuma pergunta cadastrada!
                    </div>
                @endif
            </table>
        </div>

    </div>
</div>