<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 04/01/2017
 * Time: 10:40 AM
 */

namespace tests\features;


class CreateProductTest extends \FeatureTestCase
{
    public function test_a_user_can_create_a_product()
    {
        //obtain a default user
        //having
        $this->actingAs($this->getDefaultUser());

        //when
        $this->visit(route('categories.create'))
            ->type('categoria1', 'descripcion')
            ->click('Aceptar');

        //then
        $this->seeInDatabase('category',[
            'descripcion' => 'categoria1'
        ]);
        //redirected to category list
        $this->seeInElement('h1', 'Listado de Categorias');


    }

}