<?php

namespace App\Http\Controllers\CandidatePanel;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class CandidateController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role === 'admin'){
            return redirect()->route('admin.dashboard');
        }else if(Auth::user()->role === 'company'){
            return redirect()->route('company.dashboard');
        }
        return view('dashboard');
    }

    public function candidateProfile(){
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        return view('candidate.pages.profile',compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id = Auth::user()->id;

       if($request->hasFile('image')){
        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$t}-{$file_name}";
        $img_url = "uploads/{$img_name}";

        $img->move(public_path('uploads'),$img_name);
        $filPath = $request->input('file_path');
        File::delete($filPath);

        $user = User::find($id);
        $user->name  =$request->name;
        $user->mobile  =$request->mobile;
        $user->designation  =$request->designation;
        $user->image = $img_url;
        $user->save();
       }else{
        $user = User::find($id);
        $user->name  =$request->name;
        $user->mobile  =$request->mobile;
        $user->designation  =$request->designation;
        $user->save();
       }
        return Redirect::route('candidateProfile')->with('status', 'profile-updated');
    }
    public function applyedJobList(){
        $applications = JobApplication::where('user_id',Auth::user()->id)->get();
        return view('candidate.pages.applyedJobList',compact('applications'));
    }

}
