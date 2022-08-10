<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ProyectosController extends Controller
{
    public static function index()
    {
        return view('welcome');
    }
    public static function crearProyecto(Request $request)
    {
        $path = 'pruebas_varias/Prueba.txt';
        Storage::disk('local')->put($path, 'Creo archivo'); //Crear un nuevo fichero
        Storage::disk('local')->append($path , '--------------------------------------'); // Sigue escribiendo en el
        Proyectos::crearProyecto($request->all());
    }
}
