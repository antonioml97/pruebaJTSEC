<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActividadesUsuario;
use Illuminate\Routing\Controller;

class ActividadesUsuarioController extends Controller
{
    public static function crearActividadesUsuario(Request $request)
    {
        ActividadesUsuario::crearActividadesUsuarioBD($request->all());
    }
}
