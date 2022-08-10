<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Proyectos;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActividadesTest extends TestCase
{
    public function testCreateActividades()
    {   
        $test_actividades = [
            'proyecto_id' => Proyectos::all()->random()->id,
            'nombre_actividad' => 'Actividad ' . random_int(0,100),
        ];
        $response = $this->post( 'http://localhost:8000/actividades/crearActividades',  $test_actividades );
        $response->assertStatus(200);
        $this->assertDatabaseHas('actividades',  $test_actividades);
    }
}
