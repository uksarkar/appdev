<?php

use App\Role;
use App\User;
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
        foreach(Role::all() as $role) {
            $users = factory(User::class, 5)->create();
            foreach($users as $user){
                $user->roles()->attach($role);
            }
        }
    }
}
