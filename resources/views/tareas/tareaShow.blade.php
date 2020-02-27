@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a href="{{route('tarea.edit',$tarea->id)}}" class="btn btn-warning btn-primary">
                Editar
            </a>
            <br>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fehcha inicio</th>
                    <th>Fecha Termino</th>
                    <th>Prioridad</th>
                    <th>Estatus</th>
                </thead>

                <tr>
                    <td>
                        {{$tarea->id}}
                    </td>
                    <td>{{$tarea->nombre_tarea}}</td>
                    <td>{{$tarea->descripcion}}</td>
                    <td>{{$tarea->fecha_inicio}}</td>
                    <td>{{$tarea->fecha_termino}}</td>
                    <td>{{$tarea->prioridad}}</td>
                    <td>{{$tarea->estatus}}</td>
                </tr>

            </table>

        </div>
    </div>
</div>
    @endsection