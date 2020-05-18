@extends('main')

@section('content')
<div class="ui bottom attached transition in fade tab" data-tab="mov" id="mov">
    <div class="ui two column stackable grid" id="gridMovimentacao">
        <div class="column">
            <h1 id="mudar" class="ui dividing header slideInLeft">Cadastrar Saída</h1>

            <canvas class="ui fluid container" style="margin-bottom: 5px"></canvas>
            <select class="ui dropdown" id="camera"></select>
        </div>
        <div class="column">
            <h1 class="ui header right aligned animated slideInRight" id="alunos">
                <button class="ui blue button" id="clear">Limpar</button>
                &nbsp;<button class="ui blue button" style="margin-right: 5px;" id="troca">Entrada</button></h1>
            <input type="hidden" id="funcionario" name="funcionario_id" value="">
            <input type="hidden" id="tipo" value="1">
            <input type="hidden" id="created_at" name="created_at" value="">
            <input type="hidden" id="ocorrencia" name="ocorrencia_id" value="1">
            <input type="hidden" id="foto" name="foto" value="">
            </h1>
            <div class="ui very padded center aligned segment grid">
                <div class="fluid content" id="feedback">
                    <h1>PASSE SEU CRACHÁ</h1>
                </div>
            </div>
            <br>
            <div class="ui two cards">
                <div class="card" id="cardFuncionario" style="display: none">
                    <div class="content">
                        <div class="header">
                            Matheus Luiz de Oliveira
                        </div>
                        <div class="meta">
                            52468
                        </div>
                        <div class="description">
                            Técnico Redes FTTH
                        </div>
                    </div>
                </div>

                <div class="card" id="cardCarro" style="display: none">
                    <div class="content">
                        <div class="header">
                            FIAT - Fiorino 1.4 EVO Flex
                        </div>
                        <div class="meta">
                            AAA-0000
                        </div>
                        <div class="description">
                            154872 Km
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui one column grid" id="cardConfirma" style="display: none">
                <div class="column">
                    <div class="ui fluid card">
                        <div class="center aligned content">
                            <div class="header">
                                Confirma as informações?
                            </div>
                            <div class="meta">
                                Esta ação não poderá ser desfeita
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                <button class="ui negative basic huge button">
                                    <i class="ui cancel icon"></i>
                                    Cancelar
                                </button>
                                <button class="ui positive basic huge button" onclick="confirmar()">
                                    <i class="ui check icon"></i>
                                    Confirmar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ui bottom attached transition in fade tab" data-tab="saidaok" id="saidaok">
    <div class="ui container">
        <div class="ui very padded center aligned segment grid">
            <div class="fluid content" id="feedback">
                <h1 class="ui green header">SAÍDA APROVADA</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var funcionario, carro;

    $(document).ready(function(){
            $.tab('change tab', 'mov');
            var entrada = false;
            var frequencia = $('#troca').click( function() {
                $(this).text($(this).text() == 'Cadastrar Saída' ? 'Cadastrar Entrada' : 'Cadastrar Saída').animate();
                $('#mudar').text($('#mudar').text() == 'Cadastrar Entrada' ? 'Cadastrar Saída' : 'Cadastrar Entrada');
                $('#gridMovimentacao').transition('pulse');
                entrada = !entrada;
            });
        })

        function leitura(code) {
            if($('#funcionario').val() == '') {
                axios.get('http://localhost:8000/users/json/'+code)
                .then(response => {
                    if(response.status == 200) {
                        this.dados = response.data
                        $('#cardFuncionario .header').text(dados.nome)
                        $('#cardFuncionario .meta').text(dados.id)
                        $('#cardFuncionario .description').text(dados.cargo)
                        funcionario = dados.id;
                        $('#cardFuncionario').show('slow')
                        $('#funcionario').val(code)
                        $('#feedback').html('<h1>PASSE O QR DO CARRO</h1>')
                    }
                })
            }else{
                axios.get('http://localhost:8000/veiculos/'+code)
                .then(response => {
                    if(response.status == 200) {
                        this.dados = response.data
                        $('#cardCarro .header').text(dados.marca + ' - ' + dados.modelo)
                        $('#cardCarro .meta').text(dados.placa)
                        $('#cardCarro .description').text(dados.kmatual + ' Km')
                        carro = dados.id
                        $('#cardCarro').show('slow')
                        $('#cardConfirma').show('slow')
                        $('#feedback').html('<h1>CONFIRME SUAS INFORMAÇÕES</h1>')
                    }
                })
            }
        }

        function confirmar() {
            axios.post('http://localhost:8000/api/saidas', {
                data: {
                    'carro_id': carro,
                    'user_id': funcionario
                }
            })
            .then(response => {
                if(response.status == 200) {
                    $.tab('change tab', 'saidaok');
                }
            })
        }
</script>

<script>
    var arg = {
        resultFunction: function(result) {
            console.log(result.code)
            leitura(result.code)
        }
      };
      
      var decoder = new WebCodeCamJS("canvas").buildSelectMenu(document.getElementById('camera'), 'environment|back').init(arg).play();
      document.querySelector('select').addEventListener('change', function(){
        	decoder.stop().play();
      });

</script>

@endsection