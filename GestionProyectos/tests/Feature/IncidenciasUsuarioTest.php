<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Incidencias;
use App\Models\ProyectosUsuarios;
use App\Models\IncidenciasUsuario;
use App\Models\ProyectosActividades;
use App\Models\ActividadesIncidencias;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncidenciasUsuarioTest extends TestCase
{
    //Para cumplir la restriccion de que el usuario tiene que ser RESPONSABLE  del proyecto
    // donde se le asigna la incidencia fuerzo esa condicion para comprobar el test
    public function testCreateIncienciasUsuario()
    {           
        //Si no hay un usuario Responsable en ese proyecto busco otro
        //Nota: Hay que tener en cuenta que si no exite ninguno dato en las BD que cumpla esto puedo probar un BUCLE INFINITO este test
        do{
            //Busco un proyecto y una de sus actividades aleatorio 
            $ProyectoActividades = ProyectosActividades::all()->random();
            $test_incidencias_usuario = [
                'proyectos_id' => $ProyectoActividades->proyectos_id,
                'actividades_id' => $ProyectoActividades->actividades_id,
            ];
        
            //Busco un usuario que este en ese proyecto y sea Responsable
            $ProyectoUsuario_Existe = ProyectosUsuarios::select("usuarios_id")->where('proyectos_id' , '=' , $test_incidencias_usuario['proyectos_id'] )->where('rol' , '=' , 'Responsable' )->count();
            $ProyectoUsuario = ProyectosUsuarios::select("usuarios_id")->where('proyectos_id' , '=' , $test_incidencias_usuario['proyectos_id'] )->where('rol' , '=' , 'Responsable' )->first();
            
            $Actividad_Incidencia_Existe = Incidencias::select('')->where('actividades_id','=',$test_incidencias_usuario['actividades_id'] )->count();
        }while($ProyectoUsuario_Existe <= 0 || $Actividad_Incidencia_Existe <= 0);

        $test_incidencias_usuario['usuarios_id'] = $ProyectoUsuario->usuarios_id;
        $test_incidencias_usuario['incidencias_id'] = ActividadesIncidencias::where('actividades_id','=',$test_incidencias_usuario['actividades_id'] )->first()->incidencias_id ;

        //Lanzo la peticion
        $response = $this->post( 'http://localhost:8000/incidencias_usuario/crearIncidenciasUsuario',  $test_incidencias_usuario );
        $response->assertStatus(200);

        $test_incidencias_usuario['usuario_id'] = $test_incidencias_usuario['usuarios_id'];
        unset($test_incidencias_usuario['usuarios_id']);
        unset($test_incidencias_usuario['proyectos_id']);
        unset($test_incidencias_usuario['actividades_id']);
        //Compruebo si estan los nuevos datos en la base de datos solo miro usuario_id y actividades_id
        $this->assertDatabaseHas('incidencias_usuario',  $test_incidencias_usuario);
    }

    public function testListarIncidenciassuario()
    {           
        //Busco un usuario
        $test_incidencias_usuario = [
            'usuario_id' => IncidenciasUsuario::all()->random()->usuario_id,
        ];
        
          
        //Lanzo la peticion
        $response = $this->post( 'http://localhost:8000/incidencias_usuario/listarIncidencias',  $test_incidencias_usuario );
        
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('success')
                ->has('datos')
             
        );
        $datos =  $response->json('datos');
        //Compruebo si estan los datos en la BD
        for($i = 0 ; $i < count($datos) ; $i++){
            $this->assertDatabaseHas('incidencias_usuario',  $datos[$i]);
        }
    }
}
