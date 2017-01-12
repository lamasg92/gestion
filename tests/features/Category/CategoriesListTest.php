<?php


use App\Category;

class CategoriesListTest extends FeatureTestCase
{
    public function test_a_user_can_see_the_list_of_categories()
    {
        //Having
        $this->actingAs($this->getDefaultUser());
        $category = $this->createCategory([
            'nombre' => 'categoria1',
            'descripcion' => 'primera categoria',
        ]);
        //When
        $this->visit(route('categories.index'));
        //Then
        $this->see('Categorias');
    }


    public function test_categorie_are_paginated(){

        //Having
        //put this because the category option needs to be auth
        $this->actingAs($this->getDefaultUser());

        $first = factory(Category::class)->create([
              'nombre' => 'categoria1',
              'descripcion' => 'primera categoria',
          ]);

        factory(Category::class)->times(15)->create();

        $last =   factory(Category::class)->create([
            'nombre' => 'categoriaLast',
            'descripcion' => 'ultima categoria',
        ]);

        //when
        $this->visit(route('categories.index'));
        //then
        $this->see($first->nombre)
            ->dontSee($last->nombre)
            ->click(2)
            ->see($last->nombre)
            ->dontSee($first->nombre);



    }




    public function test_an_admin_logued_user_can_edit_a_category()
    {
        $this->markTestSkipped('not implemented.');

        $category = $this->createCategory([
            'nombre' => 'categoria1',
            'descripcion' => 'primera categoria',
        ]);

        $this->visit('/category/index')
            ->seeInElement('h1', 'Categorias')
            ->press('Editar')
            ->seePageIs(route('categories.edit'))
            ->seeInElement('h1', 'Editar Categoria');
    }

    public function test_cancel_category_edition(){

        $this->markTestSkipped('not implemented.');
        //Having
        $this->actingAs($this->getDefaultUser());
        //when
        $this->visit(route('categories.edit'))
            ->press('Cancelar');
        //then
        $this->seePageIs(route('categories.index'));
    }




}
