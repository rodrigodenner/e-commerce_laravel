@extends('site.layoute')

@section('conteudo')
@section('title','Home')


<div class="row container">
  @foreach ($produtos as $produto) 
  <div class="col s12 m4">
    <div class="card">
      <div class="card">
        <div class="card-image">
          <img src="{{$produto->img}}">
          {{-- @can('ver-produto') = mostrar o link só para autorizado --}}
          @can('ver-produto',$produto)
                
          <a href="{{route('site.details',$produto->slug)}}"class="btn-floating halfway-fab waves-effect waves-light red">
            <i class="material-icons">add</i>
          </a>
          @endcan

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