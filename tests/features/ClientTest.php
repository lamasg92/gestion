<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientTest extends FeatureTestCase
{
    public function test_a_user_can_see_the_list_of_clients()
    {
        //Having
        $this->actingAs($this->getDefaultUser());

        //When
        $this->visit(route('clients.index'));
        //Then
        $this->see('Clientes');
    }
}
