@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <form action="{{ route('tarea.store') }}" method="POST">
        @csrf <!--Genera un token para verificar que el formulario viene de fuente confiable-->
            <div class="form-group">
                <label for="inputNombre">Nombre Tarea</label>
                <input type="text" class="form-control" id="inputNombre" name="nombre_tarea">
            </div>
            <div class="form-group">
                <label for="inputFecha">Fecha Inicio</label>
                <input type="date" class="form-control" id="inputFecha" name="fecha_inicio">
            </div>

            <div class="form-group">
                <label for="inputFechaTermin">Fecha Termino</label>
                <input type="date" class="form-control" id="inputFechaTermin" name="fecha_termino">
            </div>

            <div class="form-group">
                <label for="inputDesrip">Descripcion</label>
                <input type="text" class="form-control" id="inputDescrip" name="descripcion">
            </div>
            <div class="form-group">
                <label for="selectPriori">Prioridad</label>
                <select class="form-control" id="selectPriori" name="prioridad">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="terminada">
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