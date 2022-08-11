<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Proyectos;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProyectoUsuarioTest extends TestCase
{
    public function testCreateProyectoUsuario()
    {
        $test_proyecto_usuario = [
            'proyectos_id' => Proyectos::all()->random()->id,
            'usuarios_id' => User::all()->random()->id,
        ];

        $response = $this->post( 'http://localhost:8000/proyecto_usuario/crearProyectosUsuarios',  $test_proyecto_usuario );
        $response->assertStatus(200);
        $this->assertDatabaseHas('proyectos_usuarios',  $test_proyecto_usuario);
    }
}
