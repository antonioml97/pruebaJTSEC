<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActividadesIncidencias;
use Illuminate\Routing\Controller;

class ActividadesIncidenciasController extends Controller
{
    public static function crearActividadesIncidencias(Request $request)
    {
        ActividadesIncidencias::crearActividadesIncidenciasBD($request->all());
    }
}
