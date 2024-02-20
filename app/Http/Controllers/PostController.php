<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // $posts=[
        //     ["title"=>"first title",
        //     "description"=>"first description to first post"],
        //     ["title"=>"second title",
        //     "description"=>"second description to second post"],
        //     ["title"=>"third title",
        //     "description"=>"third description to third post"]
        // ];
        $posts=Post::paginate(20);
         return view('posts.index',['posts'=>$posts]);

    }
    public function create(){
        return view('posts.add');
    }
    public function store(Request $request){
        $request->validate([
            "title"=>['required','string','min:3','max:150'],
            "description"=>['required','string','max:1000'],
        ]);
        $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();
        // dd($request->title,$request->description);
        return back()->with('success',"Data Added Successfully");
    }
    
    public function edit($id){
        $post=Post::findorfail($id);
        return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "title"=>['required','string','min:3','max:150'],
            "description"=>['required','string','max:1000'],
        ]);
        $post=Post::findorfail($id);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();
        // dd($request->title,$request->description);
        return redirect('posts')->with('success',"Data Updated Successfully");
    }
    
    public function destroy($id){
post::destroy($id);      
return back()->with('success',"Data Deleted Successfully");

    }
    
}
