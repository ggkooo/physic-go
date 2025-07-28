<div class="row col-md-12 text-white mb-2">
    <h3>Estatísticas de Respostas</h3>
</div>

<div class="card border mb-4">
    <div class="card-body">
        <form id="form_statistics" method="post" action="" enctype="multipart/form-data">
            <div class="row align-items-end">

                <div class="col-sm-4 mb-3">
                    <label for="filtro_conteudo" class="form-label fw-bold">Conteúdo</label>
                    <select class="form-select" name="filtro_conteudo" id="filtro_conteudo" required>
                        <option value="">Selecione o conteúdo...</option>
                    </select>
                </div>

                <div class="col-sm-4 mb-3">
                    <label for="filtro_nivel" class="form-label fw-bold">Nível</label>
                    <select class="form-select" name="filtro_nivel" id="filtro_nivel" required>
                        <option value="">Selecione o nível...</option>
                    </select>
                </div>

                <div class="col-sm-4 mb-3">
                    <label for="filtro_escola" class="form-label fw-bold">Escola</label>
                    <select class="form-select" name="filtro_escola" id="filtro_escola" required>
                        <option value="">Selecione a escola...</option>
                    </select>
                </div>

            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="reset" name="btn" class="btn btn-secondary me-1">Limpar</button>
                <button type="submit" name="btn" value="salvar" id="btnSalvar" class="btn btn-danger">Filtrar</button>
            </div>

    </div>
    </form>
</div>

<div class="col-md-12">
    <figure class="highcharts-figure">
        <div id="container-acertos-erros"></div>
        <p class="highcharts-description">
        </p>
    </figure>

</div>

<div class="col-md-12">

    <div class="row">
        <div class="col-md-4">
            <figure class="highcharts-figure">
                <div id="container-conteudo"></div>
                <p class="highcharts-description">
                </p>
            </figure>
        </div>

        <div class="col-md-4">
            <figure class="highcharts-figure">
                <div id="container-nivel"></div>
                <p class="highcharts-description">
                </p>
            </figure>
        </div>

        <div class="col-md-4">
            <figure class="highcharts-figure">
                <div id="container-escolas"></div>
                <p class="highcharts-description">
                </p>
            </figure>
        </div>
    </div>

</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/themes/adaptive.js"></script>

<script>
    (function (H) {
        H.seriesTypes.pie.prototype.animate = function (init) {
            const series = this,
                chart = series.chart,
                points = series.points,
                {
                    animation
                } = series.options,
                {
                    startAngleRad
                } = series;

            function fanAnimate(point, startAngleRad) {
                const graphic = point.graphic,
                    args = point.shapeArgs;

                if (graphic && args) {

                    graphic
                        .attr({
                            start: startAngleRad,
                            end: startAngleRad,
                            opacity: 1
                        })
                        .animate({
                            start: args.start,
                            end: args.end
                        }, {
                            duration: animation.duration / points.length
                        }, function () {
                            if (points[point.index + 1]) {
                                fanAnimate(points[point.index + 1], args.end);
                            }
                            if (point.index === series.points.length - 1) {
                                series.dataLabelsGroup.animate({
                                    opacity: 1
                                },
                                    void 0,
                                    function () {
                                        points.forEach(point => {
                                            point.opacity = 1;
                                        });
                                        series.update({
                                            enableMouseTracking: true
                                        }, false);
                                        chart.update({
                                            plotOptions: {
                                                pie: {
                                                    innerSize: '0%',
                                                    borderRadius: 8
                                                }
                                            }
                                        });
                                    });
                            }
                        });
                }
            }

            if (init) {
                points.forEach(point => {
                    point.opacity = 0;
                });
            } else {
                fanAnimate(points[0], startAngleRad);
            }
        };
    }(Highcharts));

    Highcharts.chart('container-acertos-erros', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Acertos e Erros'
        },
        tooltip: {
            headerFormat: '',
            pointFormat:
                '<span style="color:{point.color}">\u25cf</span> ' +
                '{point.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                borderWidth: 2,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage}%',
                    distance: 20
                }
            }
        },
        series: [{
            enableMouseTracking: false,
            animation: {
                duration: 2000
            },
            colorByPoint: true,
            data: [{
                name: 'Acertos',
                y: 21.3
            }, {
                name: 'Erros',
                y: 18.7
            }]
        }]
    });

    Highcharts.chart('container-escolas', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Escola'
        },
        tooltip: {
            headerFormat: '',
            pointFormat:
                '<span style="color:{point.color}">\u25cf</span> ' +
                '{point.name}: <b>{point.percentage:.2f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                borderWidth: 2,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage}%',
                    distance: 20
                }
            }
        },
        series: [{
            enableMouseTracking: false,
            animation: {
                duration: 2000
            },
            colorByPoint: true,
            data: [{
                name: 'Escola 1',
                y: 30
            }, {
                name: 'Escola 2',
                y: 40
            }, {
                name: 'Escola 3',
                y: 30
            }]
        }]
    });


    Highcharts.chart('container-conteudo', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Conteúdo'
        },
        tooltip: {
            headerFormat: '',
            pointFormat:
                '<span style="color:{point.color}">\u25cf</span> ' +
                '{point.name}: <b>{point.percentage:.2f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                borderWidth: 2,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage}%',
                    distance: 20
                }
            }
        },
        series: [{
            enableMouseTracking: false,
            animation: {
                duration: 2000
            },
            colorByPoint: true,
            data: [{
                name: 'Conteúdo 1',
                y: 30
            }, {
                name: 'Conteúdo 2',
                y: 40
            }, {
                name: 'Conteúdo 3',
                y: 30
            }]
        }]
    });


    Highcharts.chart('container-nivel', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Nível'
        },
        tooltip: {
            headerFormat: '',
            pointFormat:
                '<span style="color:{point.color}">\u25cf</span> ' +
                '{point.name}: <b>{point.percentage:.2f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                borderWidth: 2,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage}%',
                    distance: 20
                }
            }
        },
        series: [{
            enableMouseTracking: false,
            animation: {
                duration: 2000
            },
            colorByPoint: true,
            data: [{
                name: 'Nível 1',
                y: 30
            }, {
                name: 'Nível 2',
                y: 40
            }, {
                name: 'Nível 3',
                y: 30
            }]
        }]
    });

</script>