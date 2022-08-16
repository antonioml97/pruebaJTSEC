<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProyectosUsuarios;
use Illuminate\Routing\Controller;

class ProyectosUsuariosController extends Controller
{
    public static function crearProyectosUsuarios(Request $request)
    {
        ProyectosUsuarios::crearProyectosUsuariosBD($request->all());
    }

    public static function listarProyectosUsuario(Request $request)
    {   
        $datos =  ProyectosUsuarios::listarProyectosUsuarioBD($request->all()) ;
        return response()->json(['success' => true, 'datos' => $datos], 200);

    }
}
