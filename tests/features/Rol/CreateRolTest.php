<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 04/01/2017
 * Time: 10:40 AM
 */

namespace tests\features;


class CreateRolTest extends \FeatureTestCase
{
    public function test_creating_a_rol()
    {
        //When
        $this->visit(route('roles.create'));
        //Then
        $this->see('Rol');
    }

    public function test_creating_a_rol_requires_authentication()
    {
        //having
        //When
        $this->visit(route('roles.create'));
        //then
        $this->seePageIs(route('login'));
    }


    public function test_an_admin_user_can_create_a_category()
    {
        $this->markTestSkipped('not implemented.');
        //having

        //when

        //then

    }

    public function test_create_rol_form_validation()
    {
        $this->markTestSkipped('not implemented.');
        //having
        $this->actingAs($this->getDefaultUser());
        //when
        $this->visit(route('roles.create'))
            ->press('Aceptar');
        //Then
        $this->seePageIs(route('rol.create'))
            ->seeErrors([
                'nombre' => 'El campo nombre es obligatorio',
            ]);
    }

    public function test_cancel_rol_creation()
    {

        $this->markTestSkipped('not implemented.');

        //Having

        //When

        //Then
    }

}