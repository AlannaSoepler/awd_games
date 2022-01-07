<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//Specifies that we are acctually uing the role model
use App\Models\Role;
//Here we are creating 2 new roles that will be put in the roles table 
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////Create a randome variable and create a new instens for Role
        $role_admin = new Role();
        //Variable goes to the attribute name and create the name admin
        $role_admin->name = 'admin';
        $role_admin->description = 'An Administrator User';
        //This is what stores  it into the database 
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An Ordinary User';
        $role_user->save();
    }
}
