<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $id = Auth::user()->id;
        //dd($id);
        $data['user'] = User::find($id);
        //dd($data);
        return view('admin.pages.user.view_profile', $data);
    }

    public function getEdit($id)
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.pages.user.edit_profile', compact('editData'));
    }

    public function postUpdate(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = time();
            $folder = '/upload/user/';
            $filePath = $folder . $imageName . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $imageName);
            $data->image = $filePath;
        }
        $data->save();

        toast('Profile updated successfully !!', 'success');
        return redirect()->route('user.profile.view');

    }
    public function getPasswordView()
    {
        $data['title'] = "Manage Password";
        $data['user'] = User::find(Auth::user()->id);

        return view('admin.pages.user.edit_password',$data);
    }

    public function postPasswordUpdate(Request $request)
    {

        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = User::find(Auth::user()->id);
            //dd($user);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profile.view')->with('success', 'Password Changed successfully!!');
        } else {
            //dd('error');

            return redirect()->back()->with('warning', 'Current Password does not matched!!');
        }
    }

}
