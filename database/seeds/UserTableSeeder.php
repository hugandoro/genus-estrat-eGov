<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super = Role::where('nombre', 'super')->first();
        $role_admin = Role::where('nombre', 'admin')->first();
        $role_editor = Role::where('nombre', 'editor')->first();
        $role_supervisor = Role::where('nombre', 'supervisor')->first();
        $role_user = Role::where('nombre', 'user')->first();

        $user = new User();
        $user->name = 'Hugo Andres Orozco';
        $user->email = 'super@gmail.com';
        $user->password = bcrypt('huanorri27');
        $user->save();
        $user->roles()->attach($role_super);

        $user = new User();
        $user->name = 'Hugo Andres Orozco';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('huanorri27');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Hugo Andres Orozco';
        $user->email = 'editor@gmail.com';
        $user->password = bcrypt('huanorri27');
        $user->save();
        $user->roles()->attach($role_editor);

        $user = new User();
        $user->name = 'Hugo Andres Orozco';
        $user->email = 'supervisor@gmail.com';
        $user->password = bcrypt('huanorri27');
        $user->save();
        $user->roles()->attach($role_supervisor);

        $user = new User();
        $user->name = 'Hugo Andres Orozco';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('huanorri27');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
