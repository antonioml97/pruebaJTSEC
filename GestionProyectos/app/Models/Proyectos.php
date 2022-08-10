<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;

    protected $table = "proyectos";

    public static function obtenerTodosProyectos()
    {
        return Proyectos::all();
    }
    public static function crearProyecto($datos)
    {
        $proyecto = new Proyectos();
        $proyecto->nombre_proyecto = $datos['nombre_proyecto'];
        $proyecto->save();
    }
}
