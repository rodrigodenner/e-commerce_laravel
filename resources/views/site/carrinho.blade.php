@extends('site.layoute')

@section('conteudo')
@section('title','Carrinho')


<div class="row container">
  @if($menssagem = Session::get('sucesso'))
  
  <div class="card green">
    <div class="card-content white-text">
      <span class="card-title">Show!!!</span>
      <p>{{$menssagem}}</p>
    </div>
  </div>
  @endif

  @if($menssagem = Session::get('aviso'))
  
  <div class="card red">
    <div class="card-content white-text">
      <span class="card-title">Atenção!!!</span>
      <p>{{$menssagem}}</p>
    </div>
  </div>
  @endif

  @if($itens->count()===0)

  <div class="card red">
    <div class="card-content white-text">
      <span class="card-title">Seu Carrinho está Vazio!!!</span>
    </div>
  </div>
  @else

  <h5>Carrinho: {{$itens->count()}}</h5>
  <table class="striped">
    <thead>
      <tr>
          <th></th>
          <th>Item Nome</th>
          <th>Item Preço</th>
          <th>Quantidade</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
  @foreach ($itens as $item) 
      <tr>
        <td>
          <img src="{{$item->attributes->img}}" width="70px" class="responsive-img circle">
        </td>
        <td>{{$item->name}}</td>

        
        <td>R$ {{number_format($item->price,2,',','.')}}</td>

        {{--Btn atualizar --}}
        <form action="{{route('site.cartatualiza')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$item->id}}">
        <td>
          <input style="width: 40px; font-weight:900" class="white center" min="1" type="number" name="quantity" value="{{$item->quantity}}">
        </td>
        <td>
          <button class="btn-floating waves-effect waves-light blue"><i class="material-icons">refresh</i></button>
        </form>

        {{-- BTN Remover --}}
        <form action="{{route('site.cartremove')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$item->id}}">
        <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
        </form>

        </td>
      </tr>
  @endforeach     
    </tbody> 
  </table>
  @endif

  
  <div class="card grey">
    <div class="card-content white-text">
      <h5>Total: R$ {{number_format(Cart::getTotal(),2,',','.')}}</h5>
      <p>Pague suas compras ate 12x sem juros!</p>
    </div>
  </div>
  
  <div class=" row center container" style="margin-top: 10px">
    <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">clear</i></a><br> <br>
    <button class="btn waves-effect waves-light green">Finalizar pedido <i class="material-icons rigth">check</i></button> 
    <a href="{{ route('site.cartclear') }}" class="btn waves-effect waves-light blue">Limpar carrinho <i class="material-icons right">clear</i></a>

  </div>
</div>
  
@endsection