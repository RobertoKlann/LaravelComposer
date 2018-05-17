<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller {

    public function lista(){
        $bProduto = DB::select('select * from produtos');

        return view('produtosListagem')->with('produtos', $bProduto);
    }
    
    public function mostra($id) {
        $bProduto = DB::select("SELECT * FROM produtos WHERE id = {$id}");
        
        if(!$bProduto) {
            return "<h1>Produto inexistente!</h1>";
        }
        
        return view('produtoMostra')->with('produto', $bProduto[0]);
    }
}