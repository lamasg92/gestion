<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nombre' => 'cate1',
            'descripcion' => 'categoria uno',
        ]);

        Category::create([
            'nombre' => 'cate',
            'descripcion' => 'categoria dos',
        ]);
    }
}
