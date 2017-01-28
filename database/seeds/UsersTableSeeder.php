<?php

use App\Entities\{
    Role, User
};
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'admin',
            'username' => 'adm',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            // 'role_id' => Role::where('nombre','admin')->first()->id,
        ]);


        $user->role_id = Role::where('nombre', 'admin')->first()->id;

        $user->save();

    }
}
