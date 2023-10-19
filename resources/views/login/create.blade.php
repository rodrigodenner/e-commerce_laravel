

@if($errors->any())
  @foreach ($errors->all() as $error)
    {{$error}} <br>
  @endforeach
@endif

<form action="{{route('users.store')}}" method="post">
@csrf
<label for="firstName"> First Name:
  <input type="text" name="firstName" placeholder="First Name"><br>
</label><br>
<label for="lastName"> Last Name:
  <input type="text" name="lastName" placeholder="Last Name"><br>
</label><br>
<label for="email"> Email:
    <input type="email" name="email" placeholder="email"><br>
</label><br>
<label for="password"> Password:
    <input type="password" name="password" placeholder="password"><br>
</label><br>
<button type="submit">Cadastrar</button>

</form>