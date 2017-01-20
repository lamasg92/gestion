<?php

use App\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleIntegrationTest extends TestCase
{
    use DatabaseTransactions;


    function test_a_role_is_saved_to_the_database()
    {
        $role = factory(Role::class)->create([
            'nombre' => 'admin',
            'descripcion' => 'administrador del sistema'
        ]);

        $this->assertSame(
            'admin',
            $role->fresh()->nombre
        );
    }
}
