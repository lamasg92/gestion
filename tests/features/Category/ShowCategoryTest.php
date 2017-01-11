<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowCategoryTest extends TestCase
{
    public function a_logued_user_can_list_categories(){
        $this->markTestSkipped('not implemented.');
        //Having
        $user = $this->defaultUser([
            'name' => 'Valentin Plechuc',
        ]);

        

    }
}
