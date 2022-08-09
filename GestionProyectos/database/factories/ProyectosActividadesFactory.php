<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proyectos;
use App\Models\Actividades;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProyectosActividadesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "proyectos_id" => Proyectos::all()->random()->id ,
            "actividades_id" => Actividades::all()->random()->id ,
        ];
    }
}
