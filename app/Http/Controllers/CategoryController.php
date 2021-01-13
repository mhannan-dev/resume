<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Http\Requests\Backend\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::latest()->paginate(5);
        //dd($data['categories']);
        return view("admin.pages.category.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = new Category();

        return view("admin.pages.category.add", compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
        //dd($request->all());
        $category->title = $request->title;
        $category->status = $request->status;
        $category->type = $request->type;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Your category has been submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $blog_category = Category::latest()->get();
        $page_title = "Edit Category";
        return view("admin.pages.category.edit", compact('page_title', 'blog_category', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->status = $request->status;
        $category->type = $request->type;
        $category->update();

        return redirect()->route('category.index')->with('success', 'Your category has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //dd($category);
        $category->delete();
        //dd('Okay');
        $category->posts()->delete();
        if (request()->expectsJson()) {
            return response()->json([
                'message' => "Your category has been deleted.",
            ]);
        }

        return redirect('/category')->with('success', "Your category has been deleted.");

    }
}
