@if($mensagem = Session::get('error'))

{{$mensagem}}

@endif

@if($errors->any())
  @foreach ($errors->all() as $error)
    {{$error}} <br>
  @endforeach
@endif

<form action="{{route('login.auth')}}" method="post">
@csrf
<label for="email"> Email:
    <input type="email" name="email" placeholder="email">
</label><br>
<label for="password"> Password:
    <input type="password" name="password" placeholder="password">
</label><br>
<input type="checkbox" name="remember"> Lembrar-me <br>
<button type="submit">Login</button>

</form>