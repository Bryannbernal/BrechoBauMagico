<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roupa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoupaController extends Controller
{


    public function index()
    {
        $catalogo = Roupa::all();
        return view('roupas.index', ['catalogo' => $catalogo]);
    }

    public function create()
    {
        return view('roupas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'nullable|string|max:50',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'marca' => 'nullable|string|max:50',
            'tamanho' => 'nullable|string|max:50',
            'preco' => 'nullable|numeric|min:0',
        ]);

        Roupa::create([
            'tipo' => $request->tipo,
            'foto' => $request->file('foto')->store('img', 'public'),
            'marca' => $request->marca,
            'tamanho' => $request->tamanho,
            'situacao' => true,
            'preco' => $request->preco,
        ]);

        return redirect('/roupas');
    }

    public function edit($id)
    {
        $roupa = Roupa::findOrFail($id);
        return view('roupas.edit', ['roupa' => $roupa]);
    }

    public function update(Request $request)
    {
        $roupa = Roupa::findOrFail($request->id);

        $request->validate([
            'tipo' => 'nullable|string|max:50',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'marca' => 'nullable|string|max:50',
            'tamanho' => 'nullable|string|max:50',
            'situacao' => 'nullable|boolean',
            'preco' => 'nullable|numeric|min:0',
        ]);

        // Mantém a imagem atual
        $foto = $request->foto;

        // Se enviou uma nova imagem
        if ($request->hasFile('foto')) {

            // Exclui a antiga (caso exista)
            if ($roupa->foto && Storage::disk('public')->exists($roupa->foto)) {
                Storage::disk('public')->delete($roupa->foto);
            }

            // Salva a nova
            $foto = $request->file('foto')->store('img', 'public');
        }

        $roupa->update([
            'tipo' => $request->tipo,
            'foto' => $foto,
            'marca' => $request->marca,
            'tamanho' => $request->tamanho,
            'situacao' => $request->situacao,
            'preco' => $request->preco,
        ]);

        return redirect('/roupas');
    }

    public function destroy(Request $request)
    {
        //PROCESSO PARA EXCLUIR ARQUIVO DE foto DA PASTA DO PROJETO
        $roupa = roupa::findOrFail($request->id);

        if ($roupa->foto && Storage::disk('public')->exists($roupa->foto)) {
            Storage::disk('public')->delete($roupa->foto);
        }

        $roupa->delete();
        roupa::destroy($request->id);
        return redirect('/roupas');
    }
}
