<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 04/01/2017
 * Time: 10:40 AM
 */

namespace tests\features;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateRolTest extends \FeatureTestCase
{

    use DatabaseTransactions;

    public function test_role_link_requires_authentication()
    {
        //Having
        $this->actingAs($this->getAdminUser());
        //When
        $this->visit(route('home'));
        //Then
        $this->see('Roles');
    }


    public function test_an_admin_user_can_creating_a_rol()
    {
        //Having
        $this->actingAs($this->getAdminUser());
        //When
        $this->visit(route('roles.create'));
        //Then
        $this->see('Rol');
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
        //Having
        $this->actingAs($this->getAdminUser());
        //When
        $this->visit(route('roles.create'));

        //When

        //Then
    }

}