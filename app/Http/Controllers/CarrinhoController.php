<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;


class CarrinhoController extends Controller
{
  public function listCart()
  {
    $itens = Cart::getContent();
    return view('site.carrinho',compact('itens'));
  }

  public function cartAdd(Request $request)
  {
    Cart::add([
      'id'=> $request->id,
      'name'=> $request->name,
      'price'=> $request->price,
      'quantity'=> abs($request->qty),
      'attributes'=> array(
        "img" => $request->image, 
      ),
    ]);
    return redirect()->route('site.carrinho')->with('sucesso','Adicionado com sucesso');
  }

  public function cartRemove(Request $request)
  {
    Cart::remove($request->id);
    return redirect()->route('site.carrinho')->with('sucesso','Produto removido com sucesso');
  }

  public function cartAtualiza(Request $request)
  {
    Cart::update($request->id,[
      'quantity' => [
        'relative'=>false,
        'value'=>abs($request->quantity),
      ]
    ]);

    return redirect()->route('site.carrinho');
  }

  public function limparCart()
  {
    Cart::clear();

    return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho está vazio');
  }
}
