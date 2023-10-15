<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
   return "Pagina index do User"; 
  
  }

  public function show($id)
  {
    return "Metodo show: {$id}";
  }
}
