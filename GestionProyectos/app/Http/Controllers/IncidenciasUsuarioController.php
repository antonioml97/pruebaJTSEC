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
}
