<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Proyectos;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProyectoUsuarioTest extends TestCase
{
    public function testCreateProyectoUsuario()
    {
        $test_proyecto_usuario = [
            'proyectos_id' => Proyectos::all()->random()->id,
            'usuarios_id' => User::all()->random()->id,
            'rol' => 'Participante'
        ];

        $response = $this->post('http://localhost:8000/proyecto_usuario/crearProyectosUsuarios',  $test_proyecto_usuario );
        $response->assertStatus(200);
        $this->assertDatabaseHas('proyectos_usuarios',  $test_proyecto_usuario);
    }

    public function testListarProyectosUsuario()
    {           
        //Busco un usuario
        $test_actividades_usuario = [
            'usuario_id' => User::all()->random()->usuario_id,
        ];
        
          
        //Lanzo la peticion
        $response = $this->post( 'http://localhost:8000/proyecto_usuarios/listarProyectos',  $test_actividades_usuario );
        $response->assertStatus(200);
        
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('success')
                ->has('datos')
             
        );
        
        $datos =  $response->json('datos');
        //Compruebo si estan los datos en la BD
        for($i = 0 ; $i < count($datos) ; $i++){
            $this->assertDatabaseHas('proyectos_usuarios',  $datos[$i]);
        }
    } 
}
