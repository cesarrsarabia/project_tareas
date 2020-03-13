@extends('layouts.app')

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

        @isset($equipo)
        {!!Form::model($equipo, ['route' => ['equipo.update', $equipo->id],'method' => 'PATCH'])!!}
        {{-- <form action="{{ route('equipo.update',$equipo->id) }}" method="POST">--}}
        @method('PATCH')
        @else
        {!! Form::open(['route' => 'equipo.store']) !!}
        {{--<form action="{{ route('equipo.store') }}" method="POST">--}}
        @endisset


        {{--@csrf--}}
        <!--Genera un token para verificar que el formulario viene de fuente confiable-->
        <div class="form-group">


            <label for="inputNombre">Nombre equipo</label>

            {!! Form::text('nombre_equipo',null, ['class' => 'form-control','id'=>'inputNombre']); !!}

            {{-- <input type="text" class="form-control" id="inputNombre" name="nombre_equipo"
                value="{{$equipo->nombre_equipo ?? ''}}">
            --}}
        </div>

        <div class="form-group">


            <label for="inputNombre">Integrantes</label>

            {!!
            Form::select('user_id[]',$users,isset($equipo) ? $equipo->users()->pluck('id'): null,
            ['class' => 'form-control','multiple'])
            !!}
            {{-- <input type="text" class="form-control" id="inputNombre" name="nombre_equipo"
                value="{{$equipo->nombre_equipo ?? ''}}">
            --}}
        </div>



        <br>

        <button type="submit" class="btn btn-primary">Guardar</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection