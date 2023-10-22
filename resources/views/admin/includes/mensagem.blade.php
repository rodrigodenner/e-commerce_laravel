@if($mensagem = Session::get('sucesso'))
<div class="card #2e7d32 green darken-3">
  <div class="card-content white-text">
    <span class="card-title">{{$mensagem}}</span>
  </div>
</div>
@endif