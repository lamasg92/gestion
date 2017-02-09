<?php

use App\Entities\Article;
use Faker\Generator;
use Styde\Seeder\Seeder;

class ArticleTableSeeder extends Seeder
{
    protected $total = 20;

    public function getModel()
    {
        return new Article();
    }
    public function getDummyData(Generator $faker, array $custom = [])
    {
        return [
            'nombre'            => $faker->word,
            'descripcion'       => $faker->text,
            'category_id'       => $faker->numberBetween($min = 1, $max = 2),
            'stock'             => $faker->numberBetween($min = 1, $max = 99),
            'precio_unitario'   => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 999.99),
        ];
    }

}