<?php

use App\Role;
use App\User;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';
    /**
     * @var \App\User
     */
    protected $defaultUser;
    protected $adminUser;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Obtain a default user
     * @return mixed
     */
    function getDefaultUser(){

        if ($this->defaultUser){
            return $this->defaultUser;
        }
        return $this->defaultUser =  $user = factory(User::class)->create();
    }

    /**
     * Obtain a default user
     * @return mixed
     */
    function getAdminUser(){
        //checking if is not already setted
        if ($this->adminUser){
            return $this->adminUser;
        }
        return $this->adminUser =  $user = User::create([
            'name' => 'admin1',
            'username' => 'admin1',
            'email' => 'email@email.com',
            'password' => bcrypt('admin'),
            'role_id' => Role::where('nombre','admin')->first()->id,
        ]);
    }
}
