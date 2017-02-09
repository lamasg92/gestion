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

        $user2 = new User([
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
        ]);
        $user2->role_id = Role::where('nombre', 'user')->first()->id;
        $user2->save();

        $user3 = new User([
            'name' => 'Otro',
            'username' => 'otro',
            'email' => 'otro@user.com',
            'password' => bcrypt('otro'),
        ]);
        $user3->role_id = Role::where('nombre', 'user')->first()->id;
        $user3->save();
    }
}
