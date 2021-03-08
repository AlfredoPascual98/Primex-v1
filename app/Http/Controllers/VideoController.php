<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Tag;

class VideoController extends Controller
{
   

   /*  function __construct()
    {
        $this->middleware(['auth','role:3']);
    } */

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags= Tag::all();
        $videos= Video::all();
       return view('videos.index',compact('videos', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['edit','admin']);
            /* $request->user()->authorizeRoles(['admin']);
            return view('admin.index'); */
            $tags= Tag::all();
            return view('videos.create',compact('tags'));
        /*$path=$request->file('video')->store('videos','public');
        $video= Video::create([
            'title' => $request->input('title'),
            'description' =>  $request-> description,
            'route'=>$path,
        ]);

        /* $user->roles()->Role::where('role_id', 'guest')->first();  */
        /* $user->role_id=Role::where('role_id', 'guest')->first();  
        return redirect()->route('videos.index'); */

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /*  public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:users',
            'email'=>'required|unique:users',
        ]);
         $role_visitor = Role::where('id','1')->first();
         $user=User::create([
             'name'=>$request->name,
             'email'=>$request->email,
             'password'=>Hash::make('secret'),
         ]);
         //by default role_user
         $user->role()->$role_visitor;
         return redirect()->route('videos.index'); 
    } */

    /* public function store(StoreUserRequest $request)
    {

        $role_visitor = Role::where('id','1')->first();
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make('secret'),
        ]);
        //by default role_visitor
        $user->roles()->attach($role_visitor);
        return redirect()->route('users.index');
    } */

    public function store(Request $request)
    {
        
        $user=Auth::user();
    
    $tag= $request->tag_id;
       if($tag=='2'){
        $tags = Tag::where('tag', 'ciencia ficción')->first();
       }
       elseif($tag=='1'){
        $tags = Tag::where('tag', 'acción')->first();
       }
       else{
        $tags = Tag::where('tag', 'comedia')->first();
       } 

    $path=$request->file('video')->store('videos','public');
    $archivo=$request->file('img')->store('img','public');

    $video=Video::create([
        'title'=>$request->input('title'),
        'description'=>$request->description,
        'user_id'=>$user->id,
        'img'=>$archivo,
        'route'=>$path,
    ]);


    //dd($tags, Tag::where('tag', 'comedia')->first());
       $video->tags()->attach($tags);
    //dd($tags);
     return redirect()->route('videos.index');
    }

     /* public function store(Request $request)
    {
        $user=Auth::user();
        
       $data= $request->validate([
        'title'=>'min:6|required',
        'description'=>'min:20|required',
        'route'=>'minetypes:video/mp4',
    ]);
    $path=$data['route']->store('videos','public');
    Video::create([
        'title' => $data['title'],
        'description' => $data['description'],
        'edito_id'=>$user->id,
        'route'=>$path,
    ]);
     //by default role_user
     return redirect()->route('videos.index');
    } */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['edit','admin']);
        $tags= Tag::all();
        $video=Video::find($id);
        $users=User::all();
        return view('videos.edit',compact('video','users', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    



    public function update(Request $request, $id)
    {

        $request->user()->authorizeRoles(['edit','admin']);
        $video=Video::find($id);
        /* $path=$request->file('video')->store('videos','public');
        $archivo=$request->file('img')->store('img','public'); */
        $video->update(['title'=>$request->input('title'),
        'description'=>$request->description,
        /* 'route'=>$path,
        'img'=>$archivo*/
        ]);
        $tag= $request->tag_id;
       if($tag=='2'){
        $tags = Tag::where('tag', 'ciencia ficción')->first();
       }
       elseif($tag=='1'){
        $tags = Tag::where('tag', 'acción')->first();
       }
       else{
        $tags = Tag::where('tag', 'comedia')->first();
       } 

        $video->tags()->attach($tags);

        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $id)
    {
        $request->user()->authorizeRoles(['edit','admin']);
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}
