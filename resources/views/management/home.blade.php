<div class="row col-md-12 mb-3">
  <div class="col-md-3">
    <div class="d-flex align-items-center p-3 mb-3 bg-danger text-white rounded shadow-sm card-dashboard">
      <div class="me-3 d-flex align-items-center justify-content-center rounded bg-white"
        style="width: 60px; height: 60px;">
        <i class="bi bi-question-lg text-danger" style="font-size: 30px;"></i>
      </div>
      <div>
        <div class="fw-bold">Perguntas</div>
        <div>
          <h5>110</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="d-flex align-items-center p-3 mb-3 bg-danger text-white rounded shadow-sm">
      <div class="me-3 d-flex align-items-center justify-content-center rounded bg-white"
        style="width: 60px; height: 60px;">
        <i class="bi bi-house-door-fill text-danger" style="font-size: 30px;"></i>
      </div>
      <div>
        <div class="fw-bold">Escolas</div>
        <div>
          <h5>30</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="d-flex align-items-center p-3 mb-3 bg-danger text-white rounded shadow-sm">
      <div class="me-3 d-flex align-items-center justify-content-center rounded bg-white"
        style="width: 60px; height: 60px;">
        <i class="bi bi-person-fill text-danger" style="font-size: 35px;"></i>
      </div>
      <div>
        <div class="fw-bold">Alunos</div>
        <div>
          <h5>1200</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="d-flex align-items-center p-3 mb-3 bg-danger text-white rounded shadow-sm">
      <div class="me-3 d-flex align-items-center justify-content-center rounded bg-white"
        style="width: 60px; height: 60px;">
        <i class="bi bi-pencil-fill text-danger" style="font-size: 30px;"></i>
      </div>
      <div>
        <div class="fw-bold">Professores</div>
        <div>
          <h5>150</h5>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row col-md-12">
  <div class="col-md-12">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/themes/adaptive.js"></script>

    <figure class="highcharts-figure">
      <div id="container"></div>

    </figure>

  </div>
</div>


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