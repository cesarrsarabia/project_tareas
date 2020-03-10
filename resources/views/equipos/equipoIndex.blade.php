@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Listado Equipos
                </div>
                <div class="card-body">
                    <hr>
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Equipo</th>
                            <th>Integrantes</th>
                            <th>Acciones</th>

                        </thead>
                        @foreach ($equipos as $equipo)
                        <tr>

                            <td>{{$equipo->id}}</td>
                            <td>{{$equipo->nombre_equipo}}</td>
                            <td>
                                @foreach ($equipo->users as $user)
                                {{$user->name}}
                                <br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('equipo.edit',$equipo->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection