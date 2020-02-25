@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Listado Tareas

                </div>
                <div class="card-body">
                    <a href="{{action('TareaController@create')}}" class="btn btn-success btn-primary">
                        Nueva Tarea
                    </a>

                    <hr>
                    <table class="table">
                        <tr>ID</tr>
                        <tr>Tarea</tr>
                        <tr>Descripcion</tr>
                        @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{$tarea->id}}</td>
                            <td>{{$tarea->nombre_tarea}}</td>
                            <td>{{$tarea->descripcion}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection