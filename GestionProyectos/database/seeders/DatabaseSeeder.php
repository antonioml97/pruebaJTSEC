<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Proyectos;
use  App\Models\ProyectosActividades;
use  App\Models\ProyectosUsuarios;
use  App\Models\Actividades;
use  App\Models\ActividadesIncidencias;
use  App\Models\ActividadesUsuario;
use  App\Models\Incidencias;
use  App\Models\IncidenciasUsuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        Proyectos::factory(10)->create();
        Actividades::factory(10)->create();
        Incidencias::factory(10)->create();

        ProyectosActividades::factory(10)->create();
        ProyectosUsuarios::factory(10)->create();
        ActividadesIncidencias::factory(10)->create();
        ActividadesUsuario::factory(10)->create();
        IncidenciasUsuario::factory(10)->create();
    }
}
