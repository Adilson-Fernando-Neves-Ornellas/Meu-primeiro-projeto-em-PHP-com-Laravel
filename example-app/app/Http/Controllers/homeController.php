<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class HomeController extends Controller
{
    // mostrar
    public function index(){
        
        $user = auth()->user();
        
        $search = request('search');

        if($search) {

            $contatos = contact::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();

        } else {
            // $contatos = contact::all();
            $contatos = $user->contatos;
        }
        
        return view('dashboard',['contatos' => $contatos, 'search' => $search]);
    }
    
    // adicionar
    public function store(Request $request) {

        $user = auth()->user();
        $contato = new contact;

        $contato->nome = $request->nome;
        $contato->numero = $request->numero;
        $contato->whatsapp = $request->whatsapp;
        $contato->user_id = $user->id;
        $contato->save();
        
        return redirect('/dashboard')->with('msg', 'Contato adicionado com sucesso!');
    }
    
    // deletar
    public function destroy($id) {

        contact::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Contato excluído com sucesso!');

    }

    // editar (primeiro acha o contato pelo id)
    public function edit($id) {

        $contato = contact::findOrFail($id);

        return view('edit', ['contato' => $contato]);

    }

    // (quando clicar em salvar edição, pega os valores do input e substitue com o que tem no banco)
    public function update(Request $request) {

        $data = $request->all();

        contact::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Contato editado com sucesso!');

    }

    
    
}