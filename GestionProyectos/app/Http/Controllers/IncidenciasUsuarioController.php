<?php

namespace App\Http\Controllers;

use App\Models\IncidenciasUsuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IncidenciasUsuarioController extends Controller
{
    public static function crearIncidenciasUsuario(Request $request)
    {
        if( IncidenciasUsuario::comprobarSiEsPosibleAñadir_IncidenciasUsuario($request->all()) ){
            IncidenciasUsuario::crearIncidendiasUsuario($request->all());
        }
    }

    public static function listarIncidenciasUsuario(Request $request)
    {   
        $datos =  IncidenciasUsuario::listarIncidenciasUsuarioBD($request->all()) ;
        return response()->json(['success' => true, 'datos' => $datos], 200);
    }
}
