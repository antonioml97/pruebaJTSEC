<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenciasUsuario extends Model
{
    use HasFactory;
    protected $table = "incidencias_usuario";

    public static function comprobarSiEsPosibleAñadir_IncidenciasUsuario($datos){
        $existe = false;
 
        $repeticiones = ProyectosUsuarios::select('proyectos_id')->where('proyectos_id' , '=' , $datos['proyectos_id'] )->where('usuarios_id' , '=' , $datos['usuarios_id'] )->where('rol' , '=' ,  'Resposable')->count();
         if($repeticiones == 0)
         { 
             $existe = false;  
         }
         else{
             $existe = true;
         }   
 
        return $existe;
    }

    public static function crearIncidendiasUsuario($datos){
        $proyectos_actividades = new IncidenciasUsuario();

        $proyectos_actividades->incidencias_id = $datos['incidencias_id'];
        $proyectos_actividades->usuario_id = $datos['usuarios_id'];

        $proyectos_actividades->save();
    }
}

