<script src="https://use.fontawesome.com/c8d28812b0.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
  integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
{!! Html::script('js/webcodecamjs.js') !!}
{!! Html::script('js/qrcodelib.js') !!}
{!! Html::script('js/filereader.js') !!}
{!! Html::script('js/DecoderWorker.js') !!}
{!! Html::script('js/moment.js') !!}
{!! Html::script('js/jquery.printElement.js') !!}
{!! Html::script('js/semantic.js') !!}
<script>
  $('select.dropdown').dropdown()
  $('.ui.dropdown').dropdown()
  
  $('.ui.left.sidebar').sidebar({
    transition: 'overlay'
  });
  
  $('.ui.left.sidebar')
    .sidebar('attach events', '#menu');
</script>
@yield('javascript')