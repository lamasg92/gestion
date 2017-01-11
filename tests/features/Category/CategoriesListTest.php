<?php


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
