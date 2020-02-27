@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @isset($tarea)
        <form action="{{ route('tarea.update',$tarea->id) }}" method="POST">
            @method('PATCH')
            @else
            <form action="{{ route('tarea.store') }}" method="POST">
                @endisset


                @csrf
                <!--Genera un token para verificar que el formulario viene de fuente confiable-->
                <div class="form-group">
                    <label for="inputNombre">Nombre Tarea</label>
                    <input type="text" class="form-control" id="inputNombre" name="nombre_tarea"
                        value="{{$tarea->nombre_tarea ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="inputFecha">Fecha Inicio</label>
                    <input type="date" class="form-control" id="inputFecha" name="fecha_inicio"
                    value="{{$tarea->fecha_inicio ?? ''}}">
                </div>

                <div class="form-group">
                    <label for="inputFechaTermin">Fecha Termino</label>
                    <input type="date" class="form-control" id="inputFechaTermin" name="fecha_termino"
                    value="{{$tarea->fecha_termino ?? ''}}">
                </div>

                <div class="form-group">
                    <label for="inputDesrip">Descripcion</label>
                    <input type="text" class="form-control" id="inputDescrip" name="descripcion"
                    value="{{$tarea->descripcion ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="selectPriori">Prioridad</label>
                    <select class="form-control" id="selectPriori" name="prioridad">
                        <option value="1" {{isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}>1</option>
                        <option value="2" {{isset($tarea) && $tarea->prioridad == 2 ? 'selected' : ''}}>2</option>
                        <option value="3" {{isset($tarea) && $tarea->prioridad == 3 ? 'selected' : ''}}>3</option>
                        <option value="4" {{isset($tarea) && $tarea->prioridad == 4 ? 'selected' : ''}}>4</option>
                        <option value="5" {{isset($tarea) && $tarea->prioridad == 5 ? 'selected' : ''}}>5</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="terminada"
                    {{isset($tarea) && $tarea->terminada == 1 ? 'checked' : ''}}>
                    <label class="form-check-label" for="defaultCheck1">
                        Terminada
                    </label>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
    </div>
</div>
@endsection