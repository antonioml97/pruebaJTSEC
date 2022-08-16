<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesUsuario extends Model
{
    use HasFactory;
    protected $table = "actividades_usuario";

    public static function crearActividadesUsuarioBD($datos){
        $es_posbile = ActividadesUsuario::esPosibleCrear_ActividadesUsuarioBD($datos);
        if($es_posbile){
            $actividades_usuario = new ActividadesUsuario();
    
            $actividades_usuario->actividades_id = $datos['actividades_id'];
            $actividades_usuario->usuario_id = $datos['usuarios_id'];
    
            $actividades_usuario->save();
        }

    }

    public static function esPosibleCrear_ActividadesUsuarioBD($datos){
        $es_posbile = ProyectosUsuarios::comprobarSiExiste_ProyectosUsuariosBD($datos);
        return $es_posbile;
    }

    public static function listarActividadesUsuarioBD($datos){
        $datos = ActividadesUsuario::where('usuario_id' , '=' , $datos['usuario_id'])->get();
        return $datos;
    }
}
