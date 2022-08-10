<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProyectosActividades;
use Illuminate\Routing\Controller;

class ProyectoActividadesController extends Controller
{
    public static function crearProyectoActividades(Request $request)
    {
        ProyectosActividades::crearProyectosActividadesBD($request->all());
    }
}
