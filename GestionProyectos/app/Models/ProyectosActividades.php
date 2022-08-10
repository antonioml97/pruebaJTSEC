<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosActividades extends Model
{
    use HasFactory;
    protected $table = "proyectos_actividades";

    public static function crearProyectosActividadesBD($datos){
        $proyectos_actividades = new ProyectosActividades();

        $proyectos_actividades->proyectos_id = $datos['proyectos_id'];
        $proyectos_actividades->actividades_id = $datos['actividades_id'];

        $proyectos_actividades->save();
    }
}
