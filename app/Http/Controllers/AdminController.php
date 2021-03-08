<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

  

    
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        /* $request->user()->authorizeRoles(['admin']);
        return view('admin.index'); */
        $users= User::all();
        return view('admin.index',compact('users'));
        
    }


    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        
        $user=User::find($id);
        return view('admins.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        
        $user=User::find($id);
        $user->update(['name'=>$request->input('name'),
        'email'=>$request->email
        ]);

        return redirect()->route('admin.index');
    }
}
