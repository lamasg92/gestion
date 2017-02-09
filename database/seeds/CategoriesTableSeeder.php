<?php

use App\Entities\Category;
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
            'nombre' => 'cat1',
            'descripcion' => 'categoria 1',
        ]);
        Category::create([
            'nombre' => 'cat2',
            'descripcion' => 'categoria2',
        ]);
    }
}
