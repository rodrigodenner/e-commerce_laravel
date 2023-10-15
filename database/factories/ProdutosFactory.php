<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
      $nome = $this->faker->unique()->sentence();
        return [
          'nome'=>$nome,
          'descricao'=>$this->faker->paragraph(),
          'preco'=>$this->faker->randomNumber(2),
          'slug'=>Str::slug($nome),
          'img'=>$this->faker->imageUrl(400,400),
          'id_user'=>User::pluck('id')->random(),
          'id_categoria'=>Categoria::pluck('id')->random(),

        ];
    }
}
