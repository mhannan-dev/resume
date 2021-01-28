<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\ContactRequest;
use App\Post;
use App\Skill;
use App\Category;
use App\Project;
use App\Tools_Software;
use App\Education;
use App\Experience;
use App\User;


use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function index()
    {
        $data['posts'] = Post::orderBy('created_at', 'desc')->paginate(4);
        $data['project_category'] = Category::where('type', 2)->get();
        $data['projects'] = Project::all();
        $data['skills'] = Skill::orderBy('data_level', 'desc')->get();
        $data['tools_software'] = Tools_Software::all();
        $data['degree'] = Education::orderBy('id', 'desc')->get();
        $data['experiences'] = Experience::orderBy('id', 'desc')->get();
        //dd($data['experiences']);
     
        return view('frontend.home_welcome', $data);
    }
    public function store(ContactRequest $request)
    {
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
