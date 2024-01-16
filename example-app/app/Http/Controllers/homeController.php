<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class HomeController extends Controller
{
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
    
}