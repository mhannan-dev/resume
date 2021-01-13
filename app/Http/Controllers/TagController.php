<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use App\Http\Requests\Backend\tagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
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
        $data['tags'] = Tag::latest()->paginate(5);
        $data['title'] = "All Tag";

        //dd($data['tags']);
        return view("admin.pages.tag.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tag = new Tag();
        return view("admin.pages.tag.add", compact('tag'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tag $tag)
    {
        //dd($request->all());
        $tag->title = $request->title;
        $tag->save();
        return redirect()->route('tag.index')->with('success', 'Your tag has been submitted!');
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
    public function edit(Tag $tag)
    {
        $blog_tag = Tag::latest()->get();
        $page_title = "Edit tag";
        return view("admin.pages.tag.edit", compact('page_title', 'blog_tag', 'tag'));
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
        $tag = Tag::find($id);
        $tag->title = $request->title;
        $tag->update();

        return redirect()->route('tag.index')->with('success', 'Your tag has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //dd($tag);
        $tag->delete();
        //dd('Okay');
        
        if (request()->expectsJson()) {
            return response()->json([
                'message' => "Your tag has been deleted.",
            ]);
        }

        return redirect('/tag')->with('success', "Your tag has been deleted.");

    }
}
