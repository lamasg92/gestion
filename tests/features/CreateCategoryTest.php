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
    public function test_a_user_can_create_a_category()
    {
        $descripcion = 'categoria1';
        //obtain a default user
        //having
        $this->actingAs($this->getDefaultUser());

        //when
        $this->visit(route('categories.create'))
            ->type($descripcion, 'descripcion')
            ->click('Aceptar');

        //then
        $this->seeInDatabase('category',[
            'descripcion' => $descripcion,
        ]);
        //redirected to category list
        $this->see($descripcion);

    }

}