@extends('layouts.tema')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <a href="{{action('TareaController@create')}}" class="btn btn-success btn-primary">
            Nueva Tarea
        </a>

        <hr>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Tarea</th>
                <th>Descripcion</th>
            </thead>
            @foreach ($tareas as $tarea)
            <tr>
                <td>
                    <a href="{{route('tarea.show',$tarea->id)}}">
                        {{$tarea->id}}
                    </a>
                </td>
                <td>{{$tarea->nombre_tarea}}</td>
                <td>{{$tarea->descripcion}}</td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>
  </div>


@endsection