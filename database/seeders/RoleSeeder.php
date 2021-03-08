<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role=new Role();
       $role->name="guest";
       $role->description="visitante";
       $role->save();
       $role=new Role();
       $role->name="editor";
       $role->description="editor de pagina";
       $role->save();
       $role=new Role();
       $role->name="admin";
       $role->description="administrador";
       $role->save();
    }
}
