<div class="d-flex flex-column align-items-center mt-5">
    <div class="col-md-10 col-10 card-questions mt-3 mb-5">
        <div class="content-questions w-100">
            <h4 class="text-white mb-4">Estatísticas da Questão</h4>
            <div class="mb-3 text-white">
                <div class="d-flex flex-row justify-content-between">
                    <p class="bg-danger py-2 px-3 rounded-1"><strong>Conteúdo:</strong> {{ $question->content }}</p>
                    <p class="bg-danger py-2 px-3 rounded-1"><strong>Série:</strong> {{ $question->grade }}</p>
                </div>
                <p><strong>Enunciado:</strong> {{ str_replace(['<p>', '</p>'], '', $question->statement) }}</p>
                <p><strong>Fonte:</strong> {{ $question->source }}</p>
            </div>
            <div id="container-acertos-erros" style="height: 350px;"></div>
            <div class="text-end mt-4">
                <a href="{{ route('management.questions') }}" class="btn btn-danger px-4">Voltar</a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const correct = {{ $question->correct_count ?? 0 }};
        const wrong = {{ $question->wrong_count ?? 0 }};
        Highcharts.chart('container-acertos-erros', {
            chart: {
                type: 'pie',
                backgroundColor: '#262626'
            },
            title: {
                text: 'Acertos x Erros',
                style: { color: '#fff' }
            },
            tooltip: {
                pointFormat: '<b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f}%',
                        color: '#fff'
                    }
                }
            },
            series: [{
                name: 'Respostas',
                colorByPoint: true,
                data: [
                    {
                        name: 'Acertos',
                        y: correct,
                        color: '#28a745'
                    },
                    {
                        name: 'Erros',
                        y: wrong,
                        color: '#dc3545'
                    }
                ]
            }]
        });
    });
</script>
