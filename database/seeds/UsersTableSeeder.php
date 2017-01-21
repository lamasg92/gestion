<?php

use Illuminate\Database\Seeder;

use App\{User, Role};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'adm',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role_id' => Role::where('nombre','admin')->first()->id,
        ]);
    }
}
