<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Backend\ProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Project";
        $data['projects'] = Project::all();
        return view("admin.pages.project.index", $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        $data['project_category'] = Category::where('type', 2)->get();
        return view("admin.pages.project.add", $data, compact('project'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request, Project $project)
    {
    
        //dd($request);
        if ($request->has('image')) {
            $image = $request->file('image');
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate . '-' . rand(1, 100) . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('project')) {
                Storage::disk('public')->makeDirectory('project');
            }
            $postImage = Image::make($image)->resize(300, 300)->save(storage_path('project'));
            Storage::disk('public')->put('project/' . $imageName, $postImage);
        } else {
            $imageName = "default.png";
        }

        $project->category_id = $request->category_id;
        $project->title = $request->title;
        $project->body = $request->body;
        $project->url = $request->url;
        $project->image = $imageName;
        $project->save();


        return redirect()->route('project.index')->with('success', 'Your project has been submitted!');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
