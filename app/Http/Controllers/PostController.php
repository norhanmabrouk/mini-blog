<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    //function
    // return data
    // query bulider
    // model
    //view

    public function index(){

        //DB -> sql
        // $posts = DB::table('posts')->orderBy('id','desc')->get(); // select * posts from users
        // dd($posts);
        //return view ->data
        //with
        // compact
        //[]
        // return view('users.all')->with('posts',$posts);

        //pagination (all -> get  > pagination )
        //2- view  links())
        //3- provid -> use bootsrtap
        $posts = Post::paginate(3); //1 select * from posts
        return view('posts.all',['posts' => $posts]);

    }

    public function show($id){

        // m-   v   - c

        //Routing  -> web    -> posts/{id}    ->   controller   -> create new method show
        // show -> model return data
        // view
        $post = Post::findOrFail($id);
        // dd($post);

        return view('posts.view',['post' => $post]);

    }

        // create funnction
    // create view
    public function create(){
        // echo 'lll';
        return view('posts.create');
    }

    // create store

    public function store(Request $request){
        // request
        // dd($request);
        // catch -> requst
        // valid
        // dd($request);
      $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);
        $data['user_id'] = $request['user_id'];
        // dd($data);
        // errors

        //request -> all
       $data['image']=  Storage::putFile("posts",$request->image);

        Post::create($data);

        // dd($data);
        return redirect()->route('posts.index')->with('success',"post created success");

    }

    //edit
    //view form  -> route -> edit
    //route put / patch   -> update

    // create route -> view   // create view
    // route post -> model -> store db
    public function edit($id){
        // echo 'lll';
        $post = Post::findOrFail($id);

        return view('posts.edit',compact('post'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // dd($request['image']);
        $post = Post::findOrFail($id);
        
        if($request->hasFile('image')){
            // dd(Storage::putFile("posts",$request->image));
            if($post->image && Storage::exists($post->image)){
                Storage::delete($post->image);
            }
            
            $request->image =  Storage::putFile("posts",$request->image);
            // $request->file('image')->store('posts', 'public');
        }
        // dd($request->image);
        $post->update($request->all());
        // dd($post->image);

        return redirect()->route('posts.index')->with('success',"post updated success");

    }

    //
    public function destroy($id){
        //select one ->
        $post = Post::findOrFail($id);
        //
        // Storage::delete($post->image);
        $post->delete();// delete from posts;
        return redirect()->route('posts.index')->with('success',"post deleted success");

    }
}
