<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'editor']);
        Role::create(['name'=>'guest']);
    }
}
