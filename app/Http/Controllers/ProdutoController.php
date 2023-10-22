<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produtos;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos = Produtos::paginate(5);
        $totalProdutos = Produtos::count();
        $categorias = Categoria::all();
        
        return view('admin.produtos', compact('produtos', 'totalProdutos','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $produto = $request->all();

        if ($request->img) {
            $produto['img'] = $request->img->store('produtos');
        }

        $produto['slug'] = Str::slug($request->nome);
        $produto = Produtos::create($produto);

        return redirect()->route('admin.produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produtos::find($id);

        // // Exclua a imagem do storage se existir
        // if (Storage::exists($produto->img)) {
        //     Storage::delete($produto->img);
        // }
        
        $produto->delete();
        
        return redirect()->route('admin.produtos')->with('sucesso', 'Produto removido com sucesso!');
    }
}