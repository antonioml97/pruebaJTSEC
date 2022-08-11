<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosUsuarios extends Model
{
    use HasFactory;

    public static function crearProyectosUsuariosBD($datos){
        $proyectos_usuarios = new ProyectosUsuarios();

        $proyectos_usuarios->proyectos_id = $datos['proyectos_id'];
        $proyectos_usuarios->usuarios_id = $datos['usuarios_id'];
        $proyectos_usuarios->rol = $datos['rol'];

        $proyectos_usuarios->save();
    }
}
