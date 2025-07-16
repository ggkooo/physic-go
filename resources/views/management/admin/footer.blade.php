<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    Highcharts.chart('container', {
        chart: {
            backgroundColor: '#262626' // opcional
        },
        title: {
            text: 'Usuários Cadastrados na Plataforma (Por Período)',
            style: {
                color: '#ffffff'
            }
        },

        accessibility: {
            point: {
                valueDescriptionFormat: '{xDescription}{separator}{value} million(s)',
                style: {
                    color: '#ffffff'
                }
            }
        },

        xAxis: {
            title: {
                text: 'Período',
                style: {
                    color: '#ffffff'
                }
            },
            labels: {
                style: {
                    color: '#ffffff'
                }
            },
            categories: ['01/2025', '02/2025', '03/2025', '04/2025', '05/2025', '06/2025', '07/2025']
        },

        yAxis: {
            type: 'logarithmic',
            title: {
                text: 'Número de Usuários Cadastrados',
                style: {
                    color: '#ffffff'
                }
            },
            labels: {
                style: {
                    color: '#ffffff'
                }
            }
        },

        legend: {
            itemStyle: {
                color: '#ffffff'
            }
        },

        tooltip: {
            style: {
                color: '#ffffff'
            },
            headerFormat: '<b>{series.name}</b><br />',
            pointFormat: '{point.y}'
        },

        series: [{
            name: 'Usuários',
            data: [16, 361, 1018, 2025, 3192, 4673, 5200],
            color: '#DC3545'
        }]
    });
</script>
</body>

</html>