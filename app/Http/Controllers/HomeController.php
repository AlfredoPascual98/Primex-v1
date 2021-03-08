<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware(['auth', 'guest', 'editor' , 'admin']);
    }    

     public function index(Request $request) {
        $request->user()->authorizeRoles(['guest', 'editor' , 'admin']);           
        return view('/');
    } 
    
/*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 /* public function index()
    {
        return view('home');
    }  */
}
 