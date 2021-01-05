<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Traits\UploadTrait;

class PostController extends Controller
{

    use UploadTrait;
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
        $data['posts'] = Post::latest()->paginate(5);

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

        return view("admin.pages.blog.add");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request,  Post $post)
    {
        //dd($request->all());
        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = time();
            $folder = '/upload/';
            $filePath = $folder . $imageName . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $imageName);
            $post->image = $filePath;
        }

        $post = new Post();
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $imageName . '.' . $image->getClientOriginalExtension();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
