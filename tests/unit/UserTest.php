<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Entities\{User, Role};

class UserTest extends FeatureTestCase
{
    use DatabaseTransactions;

    public function test_isAdmin_should_checks_if_a_user_has_rol_admin()
    {
        $user = $this->getDefaultUser();

        $this->assertFalse($user->isAdmin());

        $user->role_id = 1;

        $this->assertTrue($user->isAdmin());
    }

}
