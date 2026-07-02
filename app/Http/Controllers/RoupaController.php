<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roupa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\CloudinaryService;

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

        $cloudinary = new \app\services\CloudinaryService();

        $upload = $cloudinary->upload(
            $request->file('foto')
        );

        Roupa::create([
            'tipo' => $request->tipo,
            'foto' => $upload['url'],
            'foto_public_id' => $upload['public_id'],
            'marca' => $request->marca,
            'tamanho' => $request->tamanho,
            'situacao' => true,
            'preco' => $request->preco,
        ]);

        return redirect('/roupas');
    }

    public function update(Request $request)
    {
        $roupa = Roupa::findOrFail($request->id);

        $request->validate([
            'tipo' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'marca' => 'nullable|string|max:50',
            'tamanho' => 'nullable|string|max:50',
            'situacao' => 'nullable|boolean',
            'preco' => 'nullable|numeric|min:0',
        ]);

        $cloudinary = new \app\services\CloudinaryService();

        if ($request->hasFile('foto')) {

            if ($roupa->foto_public_id) {
                $cloudinary->destroy($roupa->foto_public_id);
            }

            $upload = $cloudinary->upload(
                $request->file('foto')
            );

            $foto = $upload['url'];
            $fotoPublicId = $upload['public_id'];
        } else {

            $foto = $roupa->foto;
            $fotoPublicId = $roupa->foto_public_id;
        }

        $roupa->update([
            'tipo' => $request->tipo,
            'foto' => $foto,
            'foto_public_id' => $fotoPublicId,
            'marca' => $request->marca,
            'tamanho' => $request->tamanho,
            'situacao' => $request->situacao,
            'preco' => $request->preco,
        ]);

        return redirect('/roupas');
    }

    public function edit($id)
    {
        $roupa = Roupa::findOrFail($id);
        return view('roupas.edit', ['roupa' => $roupa]);
    }

    public function destroy($id)
    {
        $roupa = Roupa::findOrFail($id);

        if ($roupa->foto_public_id) {
            $cloudinary = new \app\services\CloudinaryService();
            $cloudinary->destroy($roupa->foto_public_id);
        }

        $roupa->delete();

        return redirect('/roupas');
    }
}
