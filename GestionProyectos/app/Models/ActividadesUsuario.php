<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesUsuario extends Model
{
    use HasFactory;
    protected $table = "actividades_usuario";

    public static function crearActividadesUsuarioBD($datos){
        $actividades_usuario = new ActividadesUsuario();

        $actividades_usuario->actividades_id = $datos['actividades_id'];
        $actividades_usuario->usuario_id = $datos['usuario_id'];

        $actividades_usuario->save();
    }
}
