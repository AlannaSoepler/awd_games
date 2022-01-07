<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
//Import Hash 
use Hash;
//Here i am creating 2 different users with 2 different roles 1 admin and 1 user
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Getting the roles that i would like to attach to the 2 new users
        //Variable Go into the Role method where name is admin. Where it is the first role
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        //This variable will have attributes from user
        $admin = new User();
        $admin->name = 'Alanna Soepler';
        $admin->email = 'alanna@gmail.com';
        $admin->password = Hash::make('password');
        $admin->save();

        //When the admin user is created I want to attach a role to this user.
        //The user must be made beforehand for this to work S
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Bob';
        $user->email = 'bob@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        $user->roles()->attach($role_user);
    }
}
