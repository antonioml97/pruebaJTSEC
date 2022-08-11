<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Actividades;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActividadesUsuarioTest extends TestCase
{   
    public function testCreateActividadesUsuario()
    {
        $test_actividades_usuario = [
            'actividades_id' => Actividades::all()->random()->id,
            'usuario_id' => User::all()->random()->id,
        ];

        $response = $this->post( 'http://localhost:8000/actividades_usuario/crearActividadesUsuario',  $test_actividades_usuario );
        $response->assertStatus(200);
        $this->assertDatabaseHas('actividades_usuario',  $test_actividades_usuario);
    }
}
