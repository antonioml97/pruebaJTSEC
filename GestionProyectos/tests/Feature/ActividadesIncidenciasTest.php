<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Actividades;
use App\Models\Incidencias;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActividadesIncidenciasTest extends TestCase
{
    public function testCreateActividadesIncidencias()
    {
        $test_actividades_incidencias = [
            'actividades_id' => Actividades::all()->random()->id,
            'incidencias_id' => Incidencias::all()->random()->id,
        ];

        $response = $this->post( 'http://localhost:8000/actividades_incidencias/crearActividadesIncidencias',  $test_actividades_incidencias );
        $response->assertStatus(200);
        $this->assertDatabaseHas('actividades_incidencias',  $test_actividades_incidencias);
    }
}
