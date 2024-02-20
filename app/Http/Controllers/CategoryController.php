<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::select('id','name')->paginate();
    return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>['required','string','min:3']

        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->save();
        return back()->with('success','data added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $posts=Post::where('category_id',$category->id)->get();
        return view('category.posts',['category'=>$category,'posts'=>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        $category=Category::findorfail($id);
        return view('category.posts',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$id )
    {
        $request->validate([
            "name"=>['required','string','min:3','max:150'],
        ]);
        $category=Category::findorfail($id);
        $category->name=$request->name;
        $category->save();
        // dd($request->title,$request->description);
        return redirect('/categories')->with('success',"Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success','data deleted successfully');
    }
}
