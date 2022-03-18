<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //
    public function v_cadastrar()
    {
        return view('cadastrar');
    }
    public function cadastrar(Request $request)
    {
        Produto::create(['nome' => $request->nome, 'valor' => $request->valor, 'quantidade' => $request->quantidade]);
        return redirect('/ver-produto')->with('status', 'Cadastrado com sucesso !');
    }
    public function ver()
    {
        $produto = Produto::all();
        if ($produto->isEmpty()) {
            return redirect('/cadastrar-produto')->with('status', 'Sem produto cadastrado , por favor cadastre um produto !');
        } else {
            return view('ver', compact('produto'));
        }
    }
    public function v_editar($id)
    {
        $produto = Produto::find($id);
        return view('editar', ['produto' => $produto]);
    }
    public function editar(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->update([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'quantidade' => $request->quantidade
        ]);
        return redirect('/ver-produto')->with('status', 'Produto foi editado com sucesso !');
    }
    public function deletar($id)
    {
        $produto = Produto::find($id)->delete();
        return redirect('/ver-produto')->with('status', 'Produto foi excluido com sucesso !');
    }
}
