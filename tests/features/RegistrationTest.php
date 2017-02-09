<?php

class RegistrationTest extends TestCase
{
    public function test_a_user_can_create_an_account()
    {

        $this->markTestSkipped('not implemented.');
        $this->visitRoute('register')
            ->type('user2@user.com', 'email')
            ->type('user2', 'username')
            ->type('user', 'name')
            ->press('Registrar');

        $this->seeInDatabase('users', [
            'email' => 'user2@user.com',
            'username' => 'user2',
            'name' => 'user',
        ]);
    }
}
