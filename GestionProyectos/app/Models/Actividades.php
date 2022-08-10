<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    use HasFactory;

    public static function obtenerTodasActividades()
    {
        return Actividades::all();
    }

    public static function crearActividades($datos)
    {
        $proyecto = new Actividades();
        $proyecto->proyecto_id = $datos['proyecto_id'];
        $proyecto->nombre_actividad = $datos['nombre_actividad'];
        $proyecto->save();
    }
}
