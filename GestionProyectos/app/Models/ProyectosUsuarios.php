<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosUsuarios extends Model
{
    use HasFactory;
    protected $table = "proyectos_usuarios";

    public static function crearProyectosUsuariosBD($datos){
        $proyectos_usuarios = new ProyectosUsuarios();

        $proyectos_usuarios->proyectos_id = $datos['proyectos_id'];
        $proyectos_usuarios->usuarios_id = $datos['usuarios_id'];
        $proyectos_usuarios->rol = $datos['rol'];

        $proyectos_usuarios->save();
    }

    public static function comprobarSiExiste_ProyectosUsuariosBD($datos){
       $existe = false;

       $repeticiones = ProyectosUsuarios::select('proyectos_id')->where('proyectos_id' , '=' , $datos['proyectos_id'] )->where('usuarios_id' , '=' , $datos['usuarios_id'] )->count();
        if($repeticiones == 0)
        { 
            $existe = false;  
        }
        else{
            $existe = true;
        }   

       return $existe;
    }
}
