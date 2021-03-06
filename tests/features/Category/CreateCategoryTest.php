<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 04/01/2017
 * Time: 10:40 AM
 */

namespace tests\features;


use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateCategoryTest extends \FeatureTestCase
{
    use DatabaseTransactions;

    public function test_creating_a_category_requires_authentication()
    {
        $this->visit(route('categories.create'))
            ->seePageIs(route('login'));
    }

    public function test_a_admin_user_can_create_a_category()
    {
        $nombre = 'categoria1';
        //having
        $this->actingAs($this->getAdminUser());
        //when
        $this->visit(route('categories.create'));
       //then
        $this->see('Categorias');

//            ->type($nombre, 'nombre')
//            ->press('Aceptar');

        //then
//        $this->seeInDatabase('categories',[
//            'nombre' => $nombre,
//        ]);
    }

    public function test_create_category_form_validation(){

        //having
        $this->actingAs($this->getAdminUser());
        //when
        $this->visit(route('categories.create'))
            ->press('Crear');
        //Then
         $this->seePageIs(route('categories.create'))
             ->seeErrors([
                 'nombre' => 'El campo nombre es obligatorio',
             ]);
  }

    public function test_cancel_category_creation(){

        $this->markTestSkipped('not implemented.');

        //Having
        $this->actingAs($this->getDefaultUser());

        //When
        $this->visit(route('categories.create'))
            ->press('Cancelar');

        //Then
        $this->seePageIs(route('categories.index'));
    }

}