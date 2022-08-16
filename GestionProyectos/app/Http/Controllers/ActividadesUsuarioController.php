<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActividadesUsuario;
use Illuminate\Routing\Controller;

class ActividadesUsuarioController extends Controller
{
    public static function esPosibleCrear_ActividadesUsuario(Request $request)
    {
        return ActividadesUsuario::esPosibleCrear_ActividadesUsuarioBD($request->all());
    }
    public static function crearActividadesUsuario(Request $request)
    {
        ActividadesUsuario::crearActividadesUsuarioBD($request->all());
    }

    public static function listarActividadesUsuario(Request $request)
    {   
        $datos =  ActividadesUsuario::listarActividadesUsuarioBD($request->all()) ;
        return response()->json(['success' => true, 'datos' => $datos], 200);

    }

}
