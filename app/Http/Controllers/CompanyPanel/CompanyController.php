<?php

namespace App\Http\Controllers\CompanyPanel;

use App\Models\Job;
use App\Models\Blog;
use App\Models\User;
use App\Models\JobType;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class CompanyController extends Controller
{
    public function index(){
        return view('companyPanel.dashboard');
    }

    public function profile(){
        $id = Auth::user()->id;
        $user =User::where('id',$id)->first();

        return view('companyPanel.pages.profile', [
            'user' =>$user,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $id = Auth::user()->id;

        $request->user()->fill($request->validated());

        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$t}-{$file_name}";
        $img_url = "uploads/{$img_name}";

        $img->move(public_path('uploads'),$img_name);

        $user = User::find($id);
        $user->name  =$request->name;
        $user->mobile  =$request->mobile;
        $user->designation  =$request->designation;
        $user->image = $img_url;
        $user->save();


        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function jobList()
    {
        $id = Auth::user()->id;
        $jobs = Job::where('user_id',$id)->paginate(5);

        return view('companyPanel.pages.jobList',compact('jobs'));
    }


    public function jobCreate(){
        $jobCategories = JobCategory::orderBy('name','ASC')->where('status',1)->get();
        $jobTypes = JobType::orderBy('name','ASC')->where('status',1)->get();
        return view('companyPanel.pages.jobCreate',compact('jobCategories','jobTypes'));
    }

    public function jobPost(Request $request){

        $request->validate([
            'title'=>'required|string|max:255',
            'jobType'=>'required',
            'category'=>'required',
            'vacancy'=>'required',
            'salary'=>'required',
            'location'=>'required',
            'description'=>'required',
            'benefits'=>'required',
            'responsibility'=>'required',
            'qualifications'=>'required',
            'keywords'=>'required',
            'experience'=>'required',
            'website'=>'required',
            'job_image'=>'required|image',
            'image'=>'required|image',
            'name'=>'required',
            'apply_before'=>'required'
        ]);

           // company image upload file
           $image = $request->file('image');
           $t = time();
           $file_name = $image->getClientOriginalName();
           $image_name = "{$t}-{$file_name}";
           $image_url = "uploads/{$image_name}";
           $image->move(public_path('uploads'),$image_name);

           // job image upload file

           $job_image = $request->file('job_image');
           $t = time();
           $file_name = $job_image->getClientOriginalName();
           $job_image_name = "{$t}-{$file_name}";
           $job_image_url = "uploads/{$job_image_name}";

           $job_image->move(public_path('uploads'),$job_image_name);

        $job = new Job();
        $job->title = $request->title;
        $job->user_id =Auth::user()->id;
        $job->job_category_id = $request->category;
        $job->job_type_id = $request->jobType;
        $job->vacancy = $request->vacancy;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->description = $request->description;
        $job->benefits = $request->benefits;
        $job->responsibility = $request->responsibility;
        $job->qualifications = $request->qualifications;
        $job->keywords = $request->keywords;
        $job->experience = $request->experience;
        $job->website = $request->website;
        $job->image = $image_url;
        $job->job_image= $job_image_url;
        $job->name = $request->name;
        $job->apply_before = $request->apply_before;
        $job->save();
        return redirect()->route('company.jobList')->with('status','Job post Successfull');
    }

    public function jobEdit(Request $request,$id){
        $jobs = Job::where('id',$id)->first();
        $jobCategories = JobCategory::orderBy('name','ASC')->where('status',1)->get();
        $jobTypes = JobType::orderBy('name','ASC')->where('status',1)->get();
        return view('companyPanel.pages.jobEdit',compact('jobs','jobCategories','jobTypes'));
    }

    public function jobUpdate(Request $request,$id){
        $userId = Auth::user()->id;
        $request->validate([
            'title'=>'required|string|max:255',
            'jobType'=>'required',
            'category'=>'required',
            'vacancy'=>'required',
            'salary'=>'required',
            'location'=>'required',
            'description'=>'required',
            'benefits'=>'required',
            'responsibility'=>'required',
            'qualifications'=>'required',
            'keywords'=>'required',
            'experience'=>'required',
            'website'=>'required',
            'apply_before'=>'required'

        ]);
        $job = Job::find($id);
        $job->title = $request->title;
        $job->job_category_id = $request->category;
        $job->job_type_id = $request->jobType;
        $job->vacancy = $request->vacancy;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->description = $request->description;
        $job->benefits = $request->benefits;
        $job->responsibility = $request->responsibility;
        $job->qualifications = $request->qualifications;
        $job->keywords = $request->keywords;
        $job->experience = $request->experience;
        $job->website = $request->website;
        $job->apply_before = $request->apply_before;
        $job->save();
        return redirect()->route('company.jobList')->with('status','Job Update Successfull');
    }

    public function jobDestory($id){
        $job = Job::find($id);
        $job->delete();
        return redirect()->back();
    }

    public function jobApplication(){
        $id = Auth::user()->id;
        $jobApplications = JobApplication::where('employer_id',$id)->with('Job')->get();
      //dd($jobApplications);
        return view('companyPanel.pages.jobApplication',compact('jobApplications'));
    }

    public function jobApplicationEdit(Request $request,$id){
        $id = Auth::user()->id;
        $jobApplications = JobApplication::where('employer_id',$id)->with('Job')->first();
        //dd($jobApplications);
        return view('companyPanel.pages.jobApplicationEdit',compact('jobApplications'));
    }

    public function jobApplicationUpdate(Request $request, $id){
        $JobApplication = JobApplication::find($id);
        $JobApplication->status = $request->status;
        $JobApplication->save();
        return redirect()->route('company.jobApplication')->with('status','Job Update Successfull');
    }


    public function blogCreate(){
        return view('companyPanel.pages.blog.blogCreate');
    }

    public function blogList(){
        $id = Auth::user()->id;
        $blogList = Blog::where('user_id',Auth::user()->id)->get();
        return view('companyPanel.pages.blog.blogList',compact('blogList'));
    }

    public function blogStore(Request $request){
        $request->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'description'=>'required',
            'image'=>'required|image',
        ]);

        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$t}-{$file_name}";
        $img_url = "uploads/{$img_name}";
        $img->move(public_path('uploads'),$img_name);


        $blogStore = new Blog();
        $blogStore->title=$request->title;
        $blogStore->excerpt=$request->excerpt;
        $blogStore->description=$request->description;
        $blogStore->image = $img_url;
        $blogStore->user_id = Auth::user()->id;
        $blogStore->save();

        return redirect()->back()->with('success','Blog Succssfully Post');
    }

    public function blogEdit($id){
        $blog = Blog::where('id',$id)->first();
        return view('companyPanel.pages.blog.blogEdit',compact('blog'));
    }
    public function blogUpdate(Request $request,$id){

        if($request->hasFile('image')){
            $img = $request->file('image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";

            $img->move(public_path('uploads'),$img_name);
            $filPath = $request->input('file_path');
            File::delete($filPath);

            $blogUpdate = Blog::find($id);
            $blogUpdate->title  =$request->title;
            $blogUpdate->excerpt  =$request->excerpt;
            $blogUpdate->description  =$request->description;
            $blogUpdate->image = $img_url;
            $blogUpdate->save();
           }else{

            $blogUpdate = Blog::find($id);
            $blogUpdate->title  =$request->title;
            $blogUpdate->excerpt  =$request->excerpt;
            $blogUpdate->description  =$request->description;
            $blogUpdate->save();
           }
           return redirect()->back()->with('success','Blog post Successfuly Update');
    }
    public function BlogDestory($id){
        $blog = Blog::where('id',$id)->first();
        $blog->delete();
        return redirect()->back()->with('success','Blog post Successfuly Delete');
    }

}
