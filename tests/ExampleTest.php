<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    //using this trait insted of databasemigratoion to make tests faster
    use DatabaseTransactions;

    public function testBasicExample()
    {
        $user = factory(App\User::class)->create([
            'name' => 'Valentin Plechuc',
        ]);

        $this->actingAs($user, 'api');

        $this->visit('/api/user')
            ->see('Valentin Plechuc');

    }
}
