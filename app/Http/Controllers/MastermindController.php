<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MastermindController extends Controller
{

    public function cargarJuego(Request $request)
    {
        $arrayEle = array();

        $intentos = 0;
        session()->put('turnos', []);
        session(['nombre' => $request->input("nombre")]);
        session(['lonEle' => $request->input("lonEle")]);
        session(['numEle' => $request->input("numEle")]);
        session(['numInt' => $request->input("numInt")]);




        if (session('numEle') > session('lonEle') != 1) {
            return view("game/inicio", ['mensaje' => "La longitud de elementos no pueden ser mayor que el numero de elementos mientras no se puedan repetir."]);
        }

        $numbers = range(1, $request->input("numEle"));
        shuffle($numbers);

        for ($i = 0; $i < session('lonEle'); $i++) {
            array_push($arrayEle, array_shift($numbers));
        }



        session(['arrayEle' => $arrayEle]);
        session(['intentos' => $intentos]);
        return view("game/mastermind", [
            'nombre' => session('nombre'),
            'lonEle' => session('lonEle'),
            'numEle' => session('numEle'),
            'numInt' => session('numInt'),
            'arrayEle' => session('arrayEle'),
            'intentos' => session('intentos'),

            'indices' => 0,
        ]);
    }


    public function comprobarJuego(Request $request)
    {

        $indices = array();

        if ($request->input("jugar") != "Comprobar") {
            return view("game/inicio");
        } else {
            $arrayResultado = array();
            $numJugador = array();
            session(['aciertos' => 0]);
            session(['candidatos' => 0]);

            for ($i = 0; $i < session('lonEle'); $i++) {
                array_push($numJugador, $request->input("numJug" . $i));
                $indice = array_search($numJugador[$i], session('arrayEle'));
                if ($indice === $i) {
                    session(['aciertos' => session('aciertos') + 1]);
                    array_push($arrayResultado, 1);
                } elseif (in_array($numJugador[$i], session('arrayEle'))) {
                    session(['candidatos' => session('candidatos') + 1]);
                    array_push($arrayResultado, 0);
                } else {
                    array_push($arrayResultado, -1);
                }
            }


            session(['numJugador' => $numJugador]);
            session(['arrayResultado' => $arrayResultado]);
            session()->push('turnos', [
                'numJugador' => session('numJugador'),
                'aciertos' => session('aciertos'),
                'candidatos' => session('candidatos'),
                'arrayResultado' => session('arrayResultado')
            ]);
            session(['intentos' => session('intentos') + 1]);

            if (session('intentos') == session('numInt') && session('aciertos') != session('lonEle')) {
                return view("game/mastermind", [
                    'nombre' => session('nombre'),
                    'lonEle' => session('lonEle'),
                    'numEle' => session('numEle'),
                    'numInt' => session('numInt'),
                    'arrayEle' => session('arrayEle'),
                    'intentos' => session('intentos'),
                    'turnos' => session('turnos'),

                    'mensaje' => 'Has perdido'
                ]);
            } elseif (session('aciertos') == session('lonEle')) {

                return view("game/mastermind", [
                    'nombre' => session('nombre'),
                    'lonEle' => session('lonEle'),
                    'numEle' => session('numEle'),
                    'numInt' => session('numInt'),
                    'arrayEle' => session('arrayEle'),
                    'intentos' => session('intentos'),
                    'turnos' => session('turnos'),
                    'mensaje' => 'Has ganado'
                ]);
            } else {
                return view("game/mastermind", [
                    'nombre' => session('nombre'),
                    'lonEle' => session('lonEle'),
                    'numEle' => session('numEle'),
                    'numInt' => session('numInt'),
                    'arrayEle' => session('arrayEle'),
                    'intentos' => session('intentos'),
                    'turnos' => session('turnos')
                ]);
            }
        }
    }
}
