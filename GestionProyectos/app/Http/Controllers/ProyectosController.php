<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProyectosController extends Controller
{
    public static function index()
    {
        return view('welcome');
    }
    public static function crearProyecto(Request $request)
    {
        Proyectos::crearProyecto($request->all());
    }
}
