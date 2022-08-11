<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesIncidencias extends Model
{
    use HasFactory;

    public static function crearActividadesIncidenciasBD($datos){
        $actividades_incidencias = new ActividadesIncidencias();

        $actividades_incidencias->actividades_id = $datos['actividades_id'];
        $actividades_incidencias->incidencias_id = $datos['incidencias_id'];

        $actividades_incidencias->save();
    }
}
