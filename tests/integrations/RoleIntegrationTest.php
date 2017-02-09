<?php

use App\Entities\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleIntegrationTest extends TestCase
{
    use DatabaseTransactions;


    function test_a_role_is_saved_to_the_database()
    {
        $role = factory(Role::class)->create([
            'nombre' => 'otro',
            'descripcion' => 'otro del sistema'
        ]);

        $this->assertSame(
            'otro',
            $role->fresh()->nombre
        );
    }
}
