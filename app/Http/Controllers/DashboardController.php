<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produtos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index()
  {
    $usuarios = User::all()->count();//quantidade de usuarios cadastrados

    //grafico 1 - usuarios
    $usersData = User::select([
      DB::raw('EXTRACT(YEAR FROM created_at) as ano'),
      DB::raw('COUNT(*) as total')
    ])
    ->groupBy('ano')
    ->orderBy('ano', 'asc')
    ->get();

    // preparando arrays
    foreach($usersData as $user){
      $ano[] = $user->ano;
      $total[] = $user->total;
    }
    // formartar para chartjs
    $userLabel= "'Comparativo de cadastros de usuários'";
    $userAno = implode(',',$ano);
    $userTotal = implode(',', $total);
     
    // Graico 2 - Categorias
    $catData = Categoria::with('produtos')->get();
    
    // preparar o arry
    foreach($catData as $cat){
      $catNome[] = "'".$cat->nome."'";
      $catTotal[] = $cat->produtos->count();
    }
    // formarta para chartj
    $catLabel = implode(',',$catNome);
    $catTotal = implode(',',$catTotal);
    
    return view('admin.dashboard',compact('usuarios','userLabel','userAno','userTotal','catLabel','catTotal'));
  }
}