<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Http\Requests\Backend\PostRequest;
use App\Http\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
    
        //$data['posts'] =  Blog::latest()->paginate(5);
        $data['posts'] = Blog::with('category')->get();
        //dd($data['posts']);
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
        $blog = new Blog();

        return view("admin.pages.blog.add", compact('blog_category', 'blog'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Blog $post)
    {
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
        $post->save();
        return redirect()->route('blog.index')->with('success', 'Your post has been submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blog_category = Category::latest()->get();
        $page_title = "Edit Post";
        return view("admin.pages.blog.edit", compact('page_title', 'blog_category', 'blog'));
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
        $post = Blog::find($id);
        //dd($post);
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->image = $imageName;
        $post->update();
        //dd($post);

        return redirect()->route('blog.index')->with('success', 'Your post has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //dd($blog);
        $blog->delete();

        if (Storage::disk('public')->exists('post/' . $blog->image)) {
            Storage::disk('public')->delete('post/' . $blog->image);
        }
        if (request()->expectsJson()) {
            return response()->json([
                'message' => "Your blog has been deleted.",
            ]);
        }

        return redirect('/blog')->with('success', "Your blog has been deleted.");

    }
}
