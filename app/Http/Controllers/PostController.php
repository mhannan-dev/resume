<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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

        $data['blogs'] = Post::with('category')->get();
        //dd($data['blogs']);
        return view("admin.pages.blog.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $blog_category = Category::latest()->where('type', '1')->get();
        $tags = Tag::all();
        //dd($blog_tag);

        $post = new Post();

        return view("admin.pages.blog.add", compact('blog_category', 'tags', 'post'));

    }

   
    public function store(PostRequest $request, Post $post)
    {


        //dd($request);
        if ($request->has('image')) {
            $image = $request->file('image');
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate . '-' . rand(1, 100) . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }
            $postImage = Image::make($image)->resize(600, 450)->save(storage_path('post'));
            Storage::disk('public')->put('post/' . $imageName, $postImage);
        } else {
            $imageName = "default.png";
        }

        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->image = $imageName;
        $post->created_by = Auth::user()->id;

        $post->save();
        $post->tags()->sync($request->tags, false);
        

        return redirect()->route('post.index')->with('success', 'Your post has been submitted!');
    }


    public function show(Post $post, $slug)
    {
        
        //return Post::find($slug);

        return view("admin.pages.blog.view",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $blog_category = Category::all();
        $tags = Tag::all();

        $page_title = "Edit Post";
        return view("admin.pages.blog.edit", compact('page_title', 'blog_category', 'post','tags'));
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

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($request->has('image')) {
            $image = $request->file('image');
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate . '-' . rand(1, 100) . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }
            $postImage = Image::make($image)->resize(600, 450)->save(storage_path('post'));
            Storage::disk('public')->put('post/' . $imageName, $postImage);
        } else {
            $imageName = "default.png";
        }
        $blog = Post::find($id);
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->image = $imageName;
        $blog->update();

        return redirect()->route('post.index')->with('success', 'Your post has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //dd($blog);
        $post->delete();
        if (Storage::disk('public')->exists('post/' . $post->image)) {
            Storage::disk('public')->delete('post/' . $post->image);
        }
        if (request()->expectsJson()) {
            return response()->json([
                'message' => "Your blog has been deleted.",
            ]);
        }

        return redirect('/post')->with('success', "Your blog has been deleted.");

    }
}
