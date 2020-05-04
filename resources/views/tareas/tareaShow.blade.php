@extends('layouts.tema')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <a href="{{route('tarea.edit',$tarea->id)}}" class="btn btn-warning btn-primary">
                Editar
            </a>
            <br>
            <br>
           {{--  @if (\Gate::allows('administrador'))--}}
                
            @can('propietario', $tarea)
                <form action="{{route('tarea.destroy',$tarea->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-primary"> Eliminar</button>
                    
                </form>
            @endcan
           
           {{-- @endif --}}
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
                    <td>{{$tarea->fecha_inicio->format('d/m/Y')}}</td>
                    <td>{{$tarea->fecha_termino->format('d/m/Y')}}</td>
                    <td>{{$tarea->prioridad}}</td>
                    <td>{{$tarea->estatus}}</td>
                </tr>
                <tr>
                    <td colspan="7">
                        Usuario: {{ $tarea->user->name}}
                        <br>
                        Categoria : {{$tarea->categoria->nombre_categoria}}
                    </td>
                </tr>

            </table>

        </div>

        <div class="col-md-4">

    
           {{-- 
            <br>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Archivo</th>
                    <th>Acciones</th>                    
                </thead>

                @foreach ($tarea->archivos as $archivo)
                <tr>
                    <td>
                        {{$archivo->id}}
                    </td>
                    <td>{{$archivo->nombre_original}}</td>
                   <td></td>
                </tr>
                @endforeach
                
                

            </table>
--}}
        </div>
    </div>
</div>
    @endsection