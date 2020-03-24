<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Equipo;
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
        return view('tareas.tareasIndex', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all()->pluck('nombre_categoria', 'id');
        $equipos = Equipo::all()->pluck('nombre_equipo', 'id')->toArray();
        //dd($categorias->pluck('nombre_categoria'.'id'));
        return view('tareas.tareasForm', compact('categorias','equipos'));
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
            'descripcion' => 'required|min:5',
            'prioridad' => 'required|int|min:1|max:5',
        ]);
        /*
        $tarea = new Tarea();
        $tarea->user_id = \Auth::id();
        $tarea->categoria_id = $request->categoria_id;
        $tarea->nombre_tarea = $request->nombre_tarea;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_termino = $request->fecha_termino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        */

        //agrega el id del usuario Loggeado
        $request->merge(['user_id' => \Auth::id()]);

        if($request->equipo_id == 0 ){
            $request->merge(['equipo_id' => null]);
       }
       
        Tarea::create($request->all());
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
        return view('tareas.tareaShow', compact('tarea'));
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
        $categorias = Categoria::all()->pluck('nombre_categoria', 'id');
        $equipos = Equipo::all()->pluck('nombre_equipo', 'id')->toArray();
        return view('tareas.tareasForm', compact('tarea', 'categorias','equipos'));
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
            'descripcion' => 'required|min:2',
            'prioridad' => 'required|int|min:1|max:5',
        ]);
        if($request->equipo_id == 0 ){
             $request->merge(['equipo_id' => null]);
        }
        Tarea::where('id',$tarea->id)->update($request->except('_token','_method'));
        /*
        $tarea->nombre_tarea = $request->nombre_tarea;
        $tarea->categoria_id = $request->categoria_id;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_termino = $request->fecha_termino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();
        */
        //
        //dd($request->all());
        //dd($request->nombre_tarea); Recupera nombres o variables en especifico
        return redirect()->route('tarea.show', $tarea->id);
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
