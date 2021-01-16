<?php

namespace App\Http\Controllers;
use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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
        $data['experiences'] = Experience::latest()->paginate(5);
        $data['title'] = "Experience";

        //dd($data['experiencs']);
        return view("admin.pages.experience.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $experience = new experience();
        //dd($experience);
        return view("admin.pages.experience.add", compact('experience'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, experience $experience)
    {
        //dd($request->all());
        $experience->company_name = $request->company_name;
        $experience->designation = $request->designation;
        $experience->job_start_from = $request->job_start_from;
        $experience->save();
        return redirect()->route('experience.index')->with('success', 'Your experience has been submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        $blog_experience = Experience::latest()->get();
        $page_title = "Edit Working Information";
        return view("admin.pages.experience.edit", compact('page_title', 'blog_experience', 'experience'));
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
        $experience = Experience::find($id);
        $experience->company_name = $request->company_name;
        $experience->designation = $request->designation;
        $experience->job_start_from = $request->job_start_from;
        $experience->update();

        return redirect()->route('experience.index')->with('success', 'Your experience has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        
        $experience->delete();
        if (request()->expectsJson()) {
            return response()->json([
                'message' => "Your experience has been deleted.",
            ]);
        }

        return redirect('/experience')->with('success', "Your experience has been deleted.");

    }
}
