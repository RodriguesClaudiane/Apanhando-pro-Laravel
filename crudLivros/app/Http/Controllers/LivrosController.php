<?php

namespace App\Http\Controllers;

use App\Models\Livros;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response =[
            'livro' => Livros::all(),
            'success' => true
        ];
        return response($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'titulo'=>['required','string'],
            'autor'=>['required','string'],
            'genero'=>['required','string'],
            'quant_paginas'=>['required','integer']
        ]);
        $response = [
            'livro' => Livros::create($validate),
            'success'=> true
        ];
        return response($response,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $livro = Livros::find($id);
        return response($livro, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_disponibilidade($id)
    {
        $livro = Livros::find($id);
        $livro->update([
            'disponibilidade'=>$livro['disponibilidade'] === 'Disponível' ? 'Indisponível' : 'Disponível'
        ]);
        return response($livro, 200);
    }


    public function update(Request $request, $id)
        {
            $validate = $request->validate([
                'titulo'=>['required','string'],
                'autor' =>['required','string'],
                'genero'=>['required','string'],
                'quant_paginas'=>['required','integer']
            ]);
            $livro = Livros::find($id);
            $livro->update($validate);
            return response($livro, 200);
        }

    /**
     * Remove the specified resource from storage.S
     */
    public function destroy(Request $request)
    {
        $ids = $request->validate([
            'ids'=>['required','array']
        ]);
        $livro= Livros::destroy($ids['ids']);
        return response($livro, 200);
    }
}
