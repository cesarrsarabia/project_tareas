<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //
    // Asignacion masiva de datos
    //Dentro del arreglo , el nombre de las columnas que se reciben
    protected $fillable = [
        'categoria_id',
        'user_id',
        'nombre_tarea',
        'descripcion',
        'prioridad',
        'fecha_inicio',
        'fecha_termino',
        'equipo_id'
    ];

    protected $dates = ['fecha_inicio', 'fecha_termino', 'created_at', 'updated_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function archivos()
    {
        return $this->morphMany(Archivo::class);
    }
}
