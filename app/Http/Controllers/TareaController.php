<?php

namespace App\Http\Controllers;

use App\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tareas = Tarea::all();
        //dd($tareas);
        return view('tareas.tareasIndex',compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.tareasForm');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre_tarea' => 'required|max:255',
            'fecha_inicio' => 'required|date', // Valida el tipo de dato sea fecha
            'fecha_termino' => 'required',
            'descripcion' => 'required|min:20',
            'prioridad' => 'required|int|min:1|max:5',
        ]);

        $tarea = new Tarea();
        $tarea->user_id = \Auth::id();
        $tarea->nombre_tarea = $request->nombre_tarea;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_termino = $request->fecha_termino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        
        //
        //dd($request->all());
        //dd($request->nombre_tarea); Recupera nombres o variables en especifico
        return redirect()->route('tarea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        //
        return view('tareas.tareaShow',compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        //
        return view('tareas.tareasForm',compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
        //Valida que ls datos no estes vacios

        $request->validate([
            'nombre_tarea' => 'required|max:255',
            'fecha_inicio' => 'required|date', // Valida el tipo de dato sea fecha
            'fecha_termino' => 'required',
            'descripcion' => 'required|min:20',
            'prioridad' => 'required|int|min:1|max:5',
        ]);

        $tarea->nombre_tarea = $request->nombre_tarea;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_termino = $request->fecha_termino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        
        //
        //dd($request->all());
        //dd($request->nombre_tarea); Recupera nombres o variables en especifico
        return redirect()->route('tarea.show',$tarea->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        //
        $tarea->delete();
        return redirect()->route('tarea.index');
    }
}
