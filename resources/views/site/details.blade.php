@extends('site.layoute')
@section('title','Produto')
@section('conteudo')

<div class="row container"  style="margin-top: 20px;">
  <div class="col s12 m6" >
    <img src="{{$produto->img}}" class="responsive-img" >
  </div>
  <div class="col s12 m6">
    <h4>{{$produto->nome}}</h4>
    <p>{{$produto->descricao}}</p>
    <p><strong>R$ {{number_format($produto->preco,2,',','.')}}</strong></p>
    <p>
      Postado por: {{$produto->user->firstName}}<br>
      Categoria: {{$produto->categoria->nome}}
    </p>
    <form action="{{route('site.cartadd')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$produto->id}}">
      <input type="hidden" name="name" value="{{$produto->nome}}">
      <input type="hidden" name="price" value="{{$produto->preco}}">
      <input type="number" name="qty" value="1" min="1">
      <input type="hidden" name="image" value="{{$produto->img}}">
    <button class="btn light-blue darken-2 btn-large">Comprar</button>
    </form>
  </div>
</div>

@endsection