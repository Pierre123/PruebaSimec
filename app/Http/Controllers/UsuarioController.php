<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $users = DB::select('select * from Usuario');
        return view('game.puntuacion', ['users' => $users]);
    }

    public function store()
    {
        $datosUsuario = request()->all();
        return response()->json($datosUsuario);
    }
}
