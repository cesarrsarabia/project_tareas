@extends('layouts.tema')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @isset($tarea)
        {!!Form::model($tarea, ['route' => ['tarea.update', $tarea->id],'method' => 'PATCH'])!!}
        {{-- <form action="{{ route('tarea.update',$tarea->id) }}" method="POST">--}}
        @method('PATCH')
        @else
        {!! Form::open(['route' => 'tarea.store']) !!}
        {{--<form action="{{ route('tarea.store') }}" method="POST">--}}
        @endisset


        {{--@csrf--}}
        <!--Genera un token para verificar que el formulario viene de fuente confiable-->
        <div class="form-group">


            <label for="inputNombre">Nombre Tarea</label>

            {!! Form::text('nombre_tarea',null, ['class' => 'form-control','id'=>'inputNombre']); !!}

            {{-- <input type="text" class="form-control" id="inputNombre" name="nombre_tarea"
                value="{{$tarea->nombre_tarea ?? ''}}">
            --}}
        </div>
        <div class="form-group">
            <label for="inputFecha">Fecha Inicio</label>
            {!! Form::text('fecha_inicio',isset($tarea) ? $tarea->fecha_inicio->toDateString(): null,
            ['class' => 'form-control','id'=>'inputFecha']); !!}
            {{-- <input type="date" class="form-control" id="inputFecha" name="fecha_inicio"
                value="{{$tarea->fecha_inicio ?? '' : }}">
            --}}
        </div>

        <div class="form-group">
            <label for="inputFechaTermin">Fecha Termino</label>
            {!! Form::text('fecha_termino',isset($tarea) ? $tarea->fecha_termino->toDateString(): null,
            ['class' => 'form-control','id'=>'inputFechaTermin']);
            !!}
            {{--
            <input type="date" class="form-control" id="inputFechaTermin" name="fecha_termino"
                value="{{$tarea->fecha_termino ?? ''}}">
            --}}
        </div>

        <div class="form-group">
            <label for="inputDesrip">Descripcion</label>
            <input type="text" class="form-control" id="inputDescrip" name="descripcion"
                value="{{$tarea->descripcion ?? ''}}">
        </div>
        <div class="form-group">
            <label for="selectPriori">Prioridad</label>
            {!!
            Form::select('prioridad', ['1' => '1','2' => '2','3' => '3'],null,['class' => 'form-control'])
            !!}
            {{-- 
                <select class="form-control" id="selectPriori" name="prioridad">
                    <option value="1" {{isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}>1</option>
            <option value="2" {{isset($tarea) && $tarea->prioridad == 2 ? 'selected' : ''}}>2</option>
            <option value="3" {{isset($tarea) && $tarea->prioridad == 3 ? 'selected' : ''}}>3</option>
            <option value="4" {{isset($tarea) && $tarea->prioridad == 4 ? 'selected' : ''}}>4</option>
            <option value="5" {{isset($tarea) && $tarea->prioridad == 5 ? 'selected' : ''}}>5</option>
            </select>
            --}}
        </div>
        <div class="form-group">
            <label>Categoria</label>
            {!!
            Form::select('categoria_id',$categorias,null,['class' => 'form-control'])
            !!}

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
        {!! Form::close() !!}
    </div>
</div>
@endsection