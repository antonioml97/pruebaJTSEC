<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Actividades;
use App\Models\ProyectosActividades;
use App\Models\ProyectosUsuarios;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\isEmpty;

class ActividadesUsuarioTest extends TestCase
{   
    //Para cumplir la restriccion de que el usuario tiene que ser participante del proyecto
    // donde se le asigna la actividad fuerzo esa condicion para comprobar el test
    public function testCreateActividadesUsuario()
    {           
        //Si no hay un usuario en ese proyecto busco otro
        do{
            //Busco un proyecto y una de sus actividades aleatorio 
            $ProyectoActividades = ProyectosActividades::all()->random();
            $test_actividades_usuario = [
                'proyectos_id' => $ProyectoActividades->proyectos_id,
                'actividades_id' => $ProyectoActividades->actividades_id,
            ];
        
            //Busco un usuario que este en ese proyecto
            $ProyectoUsuario_Existe = ProyectosUsuarios::select("usuarios_id")->where('proyectos_id' , '=' , $test_actividades_usuario['proyectos_id'] )->where('rol' , '=' , 'Participante' )->count();
            $ProyectoUsuario = ProyectosUsuarios::select("usuarios_id")->where('proyectos_id' , '=' , $test_actividades_usuario['proyectos_id'] )->where('rol' , '=' , 'Participante' )->first();
        }while($ProyectoUsuario_Existe <= 0 );
        //Nota: Hay que tener en cuenta que si no exite ninguno dato en las BD que cumpla esto puedo probar un BUCLE INFINITO este test
       
        $test_actividades_usuario['usuarios_id'] = $ProyectoUsuario->usuarios_id;

        //Lanzo la peticion
        $response = $this->post( 'http://localhost:8000/actividades_usuario/crearActividadesUsuario',  $test_actividades_usuario );
        $response->assertStatus(200);

        $test_actividades_usuario['usuario_id'] = $test_actividades_usuario['usuarios_id'];
        unset($test_actividades_usuario['usuarios_id']);
        unset($test_actividades_usuario['proyectos_id']);

        //Compruebo si estan los nuevos datos en la base de datos solo miro usuario_id y actividades_id
        $this->assertDatabaseHas('actividades_usuario',  $test_actividades_usuario);
    }
}
