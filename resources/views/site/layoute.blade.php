<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    @foreach ($categoriasMenu as $categoriaM)
    <li>
      <a href="{{route('site.categoria',$categoriaM->id)}}">{{$categoriaM->nome}}</a>
    </li>
    @endforeach
  </ul>
  <!-- Dropdown Structure -->
  <ul id='dropdown2' class='dropdown-content'>
    <li>
      <a href="{{route('admin.dashboard')}}">Dashboard</a>
      <a href="{{route('login.logout')}}">Sair</a>
    </li>
  </ul>
  <nav class="light-blue darken-2">
    <div class="nav-wrapper container">

      <ul id="nav-mobile" class="left ">
        <li><a href="{{route('site.index')}}">Home</a></li>
        <li class="dropdown-trigger" data-target="dropdown1">
          <a href="#">Categorias 
            <i class="material-icons right">expand_more</i>
          </a>
        </li>
        <li><a href="{{route('site.carrinho')}}">Carrinho <span class="badge white">{{Cart::getContent()->count()}}</span></a></li>
      </ul>

      <ul id="nav-mobile" class="right ">
        <li class="dropdown-trigger2" data-target="dropdown2">
          <a href="#">Olá! {{ auth()->user()->firstName }}! 
            <i class="material-icons right">expand_more</i>
          </a>
        </li>
      </ul>

    </div>
  </nav>
    
  @yield('conteudo')
  

 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 <script>
  document.addEventListener('DOMContentLoaded', function() {
  const elemDrop = document.querySelector('.dropdown-trigger');
  const instanceDrop = M.Dropdown.init(elemDrop, {
    coverTrigger: false,
    constrainWidth: false
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
  const elemDrop = document.querySelector('.dropdown-trigger2');
  const instanceDrop = M.Dropdown.init(elemDrop, {
    coverTrigger: false,
    constrainWidth: false
    });
  });
 </script>

</body>

</html>

