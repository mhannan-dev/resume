<?php

namespace App\Http\Controllers;
use App\Http\Requests\Backend\SkillRequest;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
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
        $data['skills'] = Skill::latest()->paginate(20);
        $data['title'] = "All skill";

        //dd($data['skills']);
        return view("admin.pages.skill.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $skill = new skill();
        return view("admin.pages.skill.add", compact('skill'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request, Skill $skill)
    {
        //dd($request->all());
        $skill->title = $request->title;
        $skill->choose_platform = $request->choose_platform;
        $skill->expertise_level = $request->expertise_level;
        $skill->save();
        return redirect()->route('skill.index')->with('success', 'Your skill has been submitted!');
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
    public function edit(Skill $skill)
    {
        $blog_skill = Skill::latest()->get();
        $page_title = "Edit skill";
        return view("admin.pages.skill.edit", compact('page_title', 'blog_skill', 'skill'));
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
        $skill = Skill::find($id);
        $skill->title = $request->title;
        $skill->update();

        return redirect()->route('skill.index')->with('success', 'Your skill has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //dd($skill);
        $skill->delete();
        //dd('Okay');
        
        if (request()->expectsJson()) {
            return response()->json([
                'message' => "Your skill has been deleted.",
            ]);
        }

        return redirect('/skill')->with('success', "Your skill has been deleted.");

    }
}
