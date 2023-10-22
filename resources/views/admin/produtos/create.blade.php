<!-- Modal Structure -->
<div id="create" class="modal">
  <div class="modal-content">
    <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
    <form class="col s12" action="{{route('admin.produto.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Nome do produto" id="nome" name="nome" type="text" class="validate">
          <label for="first_name">Nome</label>
        </div>
        <div class="input-field col s6">
          <input id="preco" type="number" name="preco" class="validate" placeholder="Preço">
          <label for="preco">Preço</label>
        </div>
        <div class="input-field col s12">
          <input id="descricao" type="text" name="descricao" class="validate" placeholder="Descrição">
          <label for="preco">Descrição</label>
        </div>

        <div class="file-field input-field col s12">
          <div class="btn">
            <span>Imagem</span>
            <input type="file" name="img">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>

        <div class="input-field col s12">
          <select name="id_categoria">
            <option value="" disabled selected>Qual categoria?</option>
            @foreach ($categorias as $categoria )
            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
            @endforeach
          </select>
          <label>Categoria</label>
        </div>          

      </div> 
      <a href="#!" class="modal-close waves-effect waves-green btn red right">Cancelar</a>
      <button type="submit" class=" waves-effect waves-green btn blue right" style="margin-right: 5px">Cadastrar</button><br>
  </div>
</form>
</div>
