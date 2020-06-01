@extends ('layouts/layout')

@section('content')

<div class="ui container">
    <div class="ui grid internally celled">
      <div class="dividing header"> </div>
      <div class="ui top sixteen wide column center aligned" style="background-color: rgb(41, 41, 41);color: #FFFFFF;">
        <h2>Estatisticas de Uso dos Veículos</h2>
      </div>
      <div class="dividing header"> </div>
      <div class="row">
        <div class="six wide column">
            <label for="mes">Selecione o mês desejado: </label>
            <div class="ui selection dropdown">
              <input type="hidden" name="mes" id="mes">
              <i class="dropdown icon"></i>
              <div class="default text">Mês</div>
              <div class="menu">
                  <div class="item" data-value="1" onclick="atualizaGrafico(myChart)">Janeiro</div>
                  <div class="item" data-value="2" onclick="atualizaGrafico(myChart)">Fevereiro</div>
                  <div class="item" data-value="3" onclick="atualizaGrafico(myChart)">Março</div>
                  <div class="item" data-value="4" onclick="atualizaGrafico(myChart)">Abril</div>
                  <div class="item" data-value="5" onclick="atualizaGrafico(myChart)">Maio</div>
                  <div class="item" data-value="6" onclick="atualizaGrafico(myChart)">Junho</div>
                  <div class="item" data-value="7" onclick="atualizaGrafico(myChart)">Julho</div>
                  <div class="item" data-value="8" onclick="atualizaGrafico(myChart)">Agosto</div>
                  <div class="item" data-value="9" onclick="atualizaGrafico(myChart)">Setembro</div>
                  <div class="item" data-value="10" onclick="atualizaGrafico(myChart)">Outubro</div>
                  <div class="item" data-value="11" onclick="atualizaGrafico(myChart)">Novembro</div>
                  <div class="item" data-value="12" onclick="atualizaGrafico(myChart)">Dezembro</div>
              </div>
          </div>
          </div>
          <div class="ten wide column">
                <canvas id="myChart" style="width:500px;height:500px;"></canvas>
          </div>
      </div>

    </div>
  </div>
  
@endsection

@section('scripts')
<script>
    var url = "{{ route('estatisticas.geraGrafico') }}";
    var mes = new Array();
    var valores = new Array();
    var teste;
    var verificaDropdown;
    var labels = [];
    var datas = [];
    var myChart = null;

    var ctx = document.getElementById('myChart').getContext('2d');


    function geraLabelsDatas(val, i) {
        labels = [];
        datas = [];
        $.each(val[i-1], function (index, value) {
            labels.push(index);
            datas.push(value);
        });
    }

    function renderizaGrafico(mychart) {
        if (mychart != null) {
            mychart.destroy();
        }

        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Veiculos',
                    backgroundColor: 'green',
                    borderColor: 'green',
                    data: datas
                }]
            },
            responsive: true,
            options: {
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1,
                        }
                    }]
                }
            }
        });
    }

    function atualizaGrafico(mychart) {
        valores = [];

        axios.get(url)
            .then(response => {
                $.each(response.data[0], function (index, value) {
                    valores.push(value);
                });

                verificaDropdown = document.getElementById("mes").value;

                switch (parseInt(verificaDropdown)) {
                    case 1:
                        geraLabelsDatas(valores, 1);
                        renderizaGrafico(mychart);
                        break;
                    case 2:
                        geraLabelsDatas(valores, 2);
                        renderizaGrafico(mychart);
                        break;
                    case 3:
                        geraLabelsDatas(valores, 3);
                        renderizaGrafico(mychart);
                        break;
                    case 4:
                        geraLabelsDatas(valores, 4);
                        renderizaGrafico(mychart);
                        break;
                    case 5:
                        geraLabelsDatas(valores, 5);
                        renderizaGrafico(mychart);
                        break;
                    case 6:
                        geraLabelsDatas(valores, 6);
                        renderizaGrafico(mychart);
                        break;
                    case 7:
                        geraLabelsDatas(valores, 7);
                        renderizaGrafico(mychart);
                        break;
                    case 8:
                        geraLabelsDatas(valores, 8);
                        renderizaGrafico(mychart);
                        break;
                    case 9:
                        geraLabelsDatas(valores, 9);
                        renderizaGrafico(mychart);
                        break;
                    case 10:
                        geraLabelsDatas(valores, 10);
                        renderizaGrafico(mychart);
                        break;
                    case 11:
                        geraLabelsDatas(valores, 11);
                        renderizaGrafico(mychart);
                        break;
                    case 12:
                        geraLabelsDatas(valores, 12);
                        renderizaGrafico(mychart);
                        break;
                    default:
                        console.log('Erro!');
                }
            });
    }

</script>

@endsection