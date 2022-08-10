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
}
