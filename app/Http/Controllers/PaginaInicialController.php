<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Roupa;
use App\Services\CloudinaryService;

class PaginaInicialController extends Controller
{
    public function index(Request $request)
    {
        $catalogo = Roupa::all();
        return view('index', ['catalogo' => $catalogo]);
    }

    public function contato()
    {
        return view('contato');
    }

    public function catalogo()
    {
        $catalogo = Roupa::all();
        return view('catalogo', ['catalogo' => $catalogo]);
    }
}
