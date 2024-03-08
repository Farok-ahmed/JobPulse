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
    public function resume(){
        $id = Auth::user()->id;
        $resume = User::where('id',$id)->first();
        return view('candidate.pages.resume',compact('resume'));
    }

    public function update(Request $request): RedirectResponse
{
    $request->validate([
        'cv'=>'nullable|file'
    ]);
    $id = Auth::user()->id;

    if ($request->hasFile('image')) {
        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$t}-{$file_name}";
        $img_url = "uploads/{$img_name}";
        $img->move(public_path('uploads'), $img_name);

        $old_img_path = $request->input('image_path');
        if ($old_img_path && file_exists($old_img_path)) {
            File::delete($old_img_path);
        }
    }

    if ($request->hasFile('cv')) {
        $cv = $request->file('cv');
        $t = time();
        $cv_name = $cv->getClientOriginalName();
        $cv_name = "{$t}-{$cv_name}";
        $cv_url = "uploads/{$cv_name}";
        $cv->move(public_path('uploads'), $cv_name);

        $old_cv_path = $request->input('cv_path');
        if ($old_cv_path && file_exists($old_cv_path)) {
            File::delete($old_cv_path);
        }
    }

    $user = User::find($id);
    $user->name = $request->name;
    $user->mobile = $request->mobile;
    $user->designation = $request->designation;
    if (isset($img_url)) {
        $user->image = $img_url;
    }
    if (isset($cv_url)) {
        $user->cv = $cv_url;
    }
    $user->save();

    return Redirect::route('candidateProfile')->with('status', 'profile-updated');
}

    public function applyedJobList(){
        $applications = JobApplication::where('user_id',Auth::user()->id)->get();
        return view('candidate.pages.applyedJobList',compact('applications'));
    }



}
