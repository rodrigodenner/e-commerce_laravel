<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
  public function index()
  {
    // return "Pagina Index de Produtos";
    $produtos = Produtos::paginate(3);
    return view('site.home',compact('produtos'));
  }

  public function details($slug)
  {
    $produto = Produtos::where('slug',$slug)->first();
    
    Gate::authorize('ver-produto',$produto);
    
    return view('site.details',compact('produto'));
  }
  
  public function categoria($id)
  {
    $categoria = Categoria::find($id);
    $produtos = Produtos::where('id_categoria',$id)->paginate(3);
    
    return view('site.categoria',compact('produtos','categoria'));
  }
}