<?php


class ExampleTest extends FeatureTestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */

    function test_basic_example()
    {
        $user = factory(App\User::class)->create([
            'name' => 'Valentin Plechuc',
        ]);

        $this->actingAs($user, 'api');

        $this->visit('/api/user')
            ->see('Valentin Plechuc');

    }
}
