@extends('layout.default')
@section('title', 'JUEGO')
@section('content')
<h1>Configuracion</h1>
@if(isset($mensaje))
  <h2>{{$mensaje}}</h2>
@endif


<form action="confMastermind" method="post">
  @csrf
  <label for="nombre">Jugador/a: </label>
  <input type="text" name="nombre" placeholder="Ingresa tu nombre"  required>
  <br>
  <label for="lonEle">Numero de Fichas</label><br>
  <input type="radio" name="lonEle" value="4" checked>4
  <br>
  <label for="numEle">Número de elementos a adivinar: </label><br>
    <input type="radio" name="numEle" value="5" checked>5
  <input type="radio" name="numEle" value="6">6
  <input type="radio" name="numEle" value="7">7
  <input type="radio" name="numEle" value="8">8
  <br>
  <label for="numInt">Número de intentos: </label><br>
  <select name="numInt">
    <option value="8">8</option>
  </select>
  <br>
  <br>
  <input type="submit" value="Empezar" name="enviar">
</form>
@stop
@section('historial')

@stop
