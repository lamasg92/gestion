<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 04/01/2017
 * Time: 10:40 AM
 */

namespace tests\features;


class CreateCategoryTest extends \FeatureTestCase
{
    public function test_creating_a_category_requires_authentication()
    {
        $this->visit(route('categories.create'))
            ->seePageIs(route('login'));
    }

    public function test_a_user_can_create_a_category()
    {
        $nombre = 'categoria1';
        //obtain a default user
        //having
        $this->actingAs($this->getDefaultUser());

        //when
        $this->visit(route('categories.create'))
            ->type($nombre, 'nombre')
            ->press('Aceptar');

        //then
        $this->seeInDatabase('categories',[
            'nombre' => $nombre,
        ]);
        //redirected to Category list
        //$this->see($nombre);

    }

    public function test_create_category_form_validation(){

        //having
        $this->actingAs($this->getDefaultUser());
        //when
        $this->visit(route('categories.create'))
            ->press('Aceptar');

         $this->seePageIs(route('categories.create'))
             ->seeErrors([
                 'nombre' => 'El campo nombre es obligatorio',

             ]);

    }

    public function test_cancel_category_creation(){

        $this->markTestSkipped('not implemented.');
        //having
        $this->actingAs($this->getDefaultUser());
        //when
        $this->visit(route('categories.create'))
            ->press('Cancelar');
        //then
        $this->seePageIs(route('categories.index'));

    }

}