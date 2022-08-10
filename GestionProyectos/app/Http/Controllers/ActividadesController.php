<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ActividadesController extends Controller
{
    public static function crearActividades(Request $request)
    {
        Actividades::crearActividades($request->all());
    }
}
