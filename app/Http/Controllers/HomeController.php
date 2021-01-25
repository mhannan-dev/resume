<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\ContactRequest;
use App\Post;
use App\Skill;
use App\Category;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data['posts'] = Post::all();
        $data['project_category'] = Category::where('type', 2)->get();
        $data['projects'] = Project::all();
        $data['skills'] = Skill::all();
        $data['user'] = User::find(Auth::user()->id);
        return view('frontend.home_welcome', $data);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        //dd($request->all());
        $msg = new Contact();
        $msg->full_name = $request->full_name;
        $msg->mobile_no = $request->mobile_no;
        $msg->email = $request->email;
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        $msg->save();
        return back()->with('success', 'Your message has been submitted!');

    }


}
