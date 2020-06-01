@extends('main')

@section('content')
<div class="ui container" style="margin-top: 20px">
    <div class="ui bottom attached transition in fade tab" data-tab="mov" id="mov">
        <div class="ui two column stackable grid" id="gridMovimentacao">
            <div class="column">
                <h1 class="ui header animated slideInLeft" id="alunos">
                    <button class="ui blue button" id="clear" onclick="limpaTela()">Limpar</button>
                </h1>
                <input type="hidden" id="funcionario" name="funcionario_id" value="">
                </h1>
                <div class="ui very padded center aligned segment grid">
                    <div class="fluid content" id="feedback">
                        <h1>PASSE SEU CRACHÁ</h1>
                    </div>
                </div>
                <br>
                <div class="ui two cards">
                    <div class="card" id="cardFuncionario" name="cardFuncionario" style="display: none">
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

                    <div class="card" id="cardCarro" name="cardCarro" style="display: none">
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
            <div class="column">
                <h1 id="mudar" class="ui dividing header">Cadastro de Movimentação</h1>

                <canvas class="ui fluid container" style="margin-bottom: 5px"></canvas>
                <select class="ui dropdown" id="camera"></select>
            </div>
        </div>
    </div>

    <div class="ui bottom attached transition in fade tab" data-tab="entrada" id="entrada">
        <div class="ui container">
            <div class="ui two column segment grid">
                <div class="column">
                    <div class="ui cards">
                        <div class="ui fluid card" id="cardResumoSaida">
                            <div class="center aligned content">
                                <div class="header">
                                    Confirma as informações?
                                </div>
                                <div class="meta">
                                    Esta ação não poderá ser desfeita
                                </div>
                                <div class="description">
                                    154872 Km
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui huge form">
                        <div class="field">
                            <label>Digite a quilometragem atual do carro</label>
                            <input type="text" name="km" id="km">
                        </div>
                        <div class="ui two buttons">
                            <button class="ui negative basic huge button" onclick="limpaTela()">
                                <i class="ui cancel icon"></i>
                                Cancelar
                            </button>
                            <button class="ui positive basic huge button" onclick="confirmarEntrada()">
                                <i class="ui check icon"></i>
                                Confirmar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui bottom attached transition in fade tab" data-tab="ok" id="ok">
        <div class="ui container">
            <div class="ui very padded center aligned segment grid">
                <div class="fluid content" id="feedback">
                    <h1 class="ui green header" id="txtOK">SAÍDA APROVADA</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="ui bottom attached transition in fade tab" data-tab="erro" id="erro">
        <div class="ui container">
            <div class="ui very padded center aligned segment grid">
                <div class="fluid content" id="feedback">
                    <h1 class="ui red header" id="txtErro">SAÍDA APROVADA</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    var funcionario, carro, res, saida;

    $(document).ready(function(){
        $.tab('change tab', 'mov');
    })

        function leitura(code) {
            if($('#funcionario').val() == '') {
                axios.get('http://localhost:8000/users/json/'+code)
                .then(response => {
                    if(response.status == 200) {
                        this.dados = response.data;
                        console.log(dados)
                        $('#cardFuncionario .header').text(dados.name);
                        $('#cardFuncionario .meta').text(dados.id);
                        $('#cardFuncionario .description').text(dados.cargo);
                        funcionario = dados.id;
                        $('#cardFuncionario').show('slow');
                        $('#funcionario').val(code);
                        $('#feedback').html('<h1>PASSE O QR DO CARRO</h1>');
                    }
                })
            }else{
                axios.get('http://localhost:8000/veiculos/json/'+code)
                .then(response => {
                    if(response.status == 200) {
                        this.dados = response.data
                        console.log(dados)
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
                'carro_id': carro,
                'user_id': funcionario
            })
            .then(response => {
                this.dados = response.data.dados
                res = dados
                if(response.status == 200) {
                    if(response.data.erros == 0) {
                        $('#txtOK').text('SAÍDA LIBERADA')
                        $.tab('change tab', 'ok');
                        setTimeout(retornarInicio, 3000)
                    }else{
                        $('#cardResumoSaida .header').text(dados.user.name)
                        $('#cardResumoSaida .meta').text(moment(dados.created_at).format('DD/MM/YYYY hh:mm:ss'))
                        $('#cardResumoSaida .description').text(dados.veiculo.modelo)

                        saida = dados.id
                        $.tab('change tab', 'entrada')
                    }
                    //setTimeout(retornarInicio(), 3000)
                }
            })
            .catch(error => {                
                $('#txtErro').text(error.message.toUpperCase()) 
                $.tab('change tab', 'erro');
                setTimeout(retornarInicio, 3000)
            })
        }

        function confirmarEntrada() {
            axios.post('http://localhost:8000/api/entradas', {                
                'carro_id': carro,
                'user_id': funcionario,
                'saida_id': saida,
                'km': $('#km').val()
            })
            .then(response => {
                this.dados = response.data.dados
                res = dados
                if(response.status == 200) {
                    if(response.data.erros == 0) {
                        $('#txtOK').text('ENTRADA OK')
                        $.tab('change tab', 'ok');
                        setTimeout(retornarInicio, 3000)
                    }
                }
            })
            .catch(error => {               
                kmOK = error.response.data.errors.km[0] != ''
                
                $.tab('change tab', 'erro');

                if (kmOK) { 
                    $('#txtErro').text(error.response.data.errors.km[0].toUpperCase())
                    setTimeout(function() {
                        $.tab('change tab', 'entrada');
                    }, 3000)
                }else{
                    $('#txtErro').text(error.message.toUpperCase())
                    setTimeout(retornarInicio, 3000)
                }    
               
            })
        }

        function limpaTela() {
            $('#funcionario').val('')
            $('#km').val('')
            carro = undefined
            saida = undefined
            funcionario = undefined

            $('#cardFuncionario').hide()
            $('#cardCarro').hide()
            $('#cardConfirma').hide()

            $('#feedback').html('<h1>PASSE SEU CRACHÁ</h1>')
        }

        function retornarInicio() {
            limpaTela()
            $.tab('change tab', 'mov')
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