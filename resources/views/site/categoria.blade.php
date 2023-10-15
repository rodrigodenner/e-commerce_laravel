@extends('site.layoute')

@section('conteudo')
@section('title','Categoria')


<div class="row container">
    <h5>Categoria: {{$categoria->nome}}</h5>
  @foreach ($produtos as $produto) 
  <div class="col s12 m4">
    <div class="card">
      <div class="card">
        <div class="card-image">
          <img src="{{$produto->img}}">
          <a href="{{route('site.details',$produto->slug)}}"class="btn-floating halfway-fab waves-effect waves-light red">
            <i class="material-icons">add</i>
          </a>
        </div>
        <div class="card-content">
          <span class="card-title">{{ Str::limit($produto->nome,10) }}</span>
          <p>{{Str::limit($produto->descricao,55, '...')}}</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="row center">
  {{$produtos->links('custom.pagination')}}
</div>

@endsection