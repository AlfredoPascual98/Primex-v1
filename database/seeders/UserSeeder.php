<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_visitor = Role::where('name','guest')->first();
        $role_editor = Role::where('name','editor')->first();
        $role_admin = Role::where('name','admin')->first();  
        /* $role_visitor = Role::where('role','guest')->first();
        $role_editor = Role::where('role','editor')->first();
        $role_admin = Role::where('role','admin')->first();  */
        $user=new User();
        $user->name='alfredo';
        $user->email='apascual@gmail.com';
        $user->password=Hash::make('password');
        /* $user->role_id=$role_admin->name;  */
        
        $user->save();
        $user->roles()->attach($role_admin);
        /* $user->role_id=$role_admin->id;  */ 
        /* $user->role_id='3'; */
       /*  $user->role_id=$role_admin->rol; */
        /* $user->roles()->$role_admin; */
        $user=new User();
        $user->name='fran';
        $user->email='fran@gmail.com';
        $user->password=Hash::make('password');
        $user->save();
        $user->roles()->attach($role_editor);
        /* $user->role_id=$role_editor->name; */
        
        $user=new User();
        $user->name='dionis';
        $user->email='dionis@gmail.com';
        $user->password=Hash::make('password');
        $user->save();
        $user->roles()->attach($role_visitor);
        /* $user->role_id=$role_visitor->name; */
        
    }
}
