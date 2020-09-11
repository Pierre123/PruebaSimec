@extends('layout.default')
@section('title', 'JUEGO')
@section('content')
<h1>Puntuaciones</h1>

<br>
<br>
<br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Intentos</th>
            <th>Ganancia</th>
            <th>Perdidas</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($users))
        @foreach($users as $user)
        <tr>
            <td> {{$user->nombre}} </td>
            <td> {{$user->intentos}} </td>
            <td> {{$user->ganancia}} </td>
            <td> {{$user->perdidas}} </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="4" >No existen Datos</td>
        </tr>
        @endif
    </tbody>
</table>
@stop
