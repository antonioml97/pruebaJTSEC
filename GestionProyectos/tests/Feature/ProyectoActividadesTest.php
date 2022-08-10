<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Proyectos;
use App\Models\Actividades;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProyectoActividadesTest extends TestCase
{
  
         
    public function testCreateProyectoActividades()
    {
        $test_proyecto_actividades = [
            'proyectos_id' => Proyectos::all()->random()->id,
            'actividades_id' => Actividades::all()->random()->id,
        ];
        
        $response = $this->post( 'http://localhost:8000/proyecto_actividades/crearProyectoActividades',  $test_proyecto_actividades );
        $response->assertStatus(200);
        $this->assertDatabaseHas('proyectos_actividades',  $test_proyecto_actividades);
    }
}
