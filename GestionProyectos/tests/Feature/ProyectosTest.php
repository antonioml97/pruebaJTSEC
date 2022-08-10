<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Proyectos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProyectosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateProyecto()
    {   
        $test_proyecto = [
            'nombre_proyecto' => 'Proyecto ' . random_int(0,100),
        ];

        $path = 'pruebas_varias/Prueba_test.txt';
        Storage::disk('local')->put($path, 'Creo archivo'); //Crear un nuevo fichero
        Storage::disk('local')->append($path , '--------------------------------------'); // Sigue escribiendo en el
        
        $response = $this->post( 'http://localhost:8000/proyectos/crearProyecto',  $test_proyecto );
        $response->assertStatus(200);
        $this->assertDatabaseHas('proyectos',  $test_proyecto);

    }
}
