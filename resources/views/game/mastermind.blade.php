@extends('layout.default')
@section('content')
<br><br><br>
<h1>Mastermind</h1>
<h2>Jugador: {{$nombre}}</h2>


<br>
@php
print_r($arrayEle);

@endphp

<br>
<form action="jugar" method="post">
    @csrf
    @for ($i=0; $i < $lonEle; $i++) <select name="numJug{{$i}}">
        @for ($j=0; $j < $numEle; $j++) <option value="{{$j+1}}" {{$i==$j ? 'selected' : ''}}>{{($j+1)}}</option>
            @endfor
            </select>
            @endfor
            <br>
            @if (isset($mensaje))
            <h2>{{$mensaje}}</h2>
            <br>
            <input type="submit" name="jugar" value="Volver a jugar">
            @else
            <br>
            <input type="submit" name="jugar" value="Comprobar">
            @endif

</form>
<br>

<br>
<p>Numero de intentos: {{$intentos}}</p>

@stop
@section('historial')

@if(isset($turnos))

@foreach ($turnos as $turno)

<label><b>Numero Ingresado:</b> </label>
<br>
@for ($i = 0; $i < count($turno['numJugador']);$i++)

<label>{{$turno['numJugador'][$i]}}</label>

    @if($turno['arrayResultado'][$i]===1)
    <img width='32px' height='32px' src="images/negro.png">
    @elseif($turno['arrayResultado'][$i]===0)
    <img width='32px' height='32px' src="images/blanco.png">
    @else
    <img width='32px' height='32px' src="images/error.png">
    @endif

    @endfor
    <p>Aciertos: {{$turno['aciertos']}} Candidatos : {{$turno['candidatos']}}</p>
    @endforeach
    @endif
    @stop
