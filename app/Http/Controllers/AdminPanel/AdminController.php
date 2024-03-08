<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $activeJob = Job::where('status','active')->count();
        $pendingJob = Job::where('status','pending')->count();
        $FeaturesJob = Job::where('features_at',1)->count();
        $activeCompany = User::where('role', 'company')
            ->where('status', 'active')->count();

        $pendingCompany = User::where('role', 'company')
            ->where('status', 'inactive')->count();
        return view('backend.admin', compact('activeCompany', 'pendingCompany','activeJob','pendingJob','FeaturesJob'));
    }
    public function jobList()
    {
        $jobs = Job::orderBy('title','ASC')->with('User')->get();
        return view('backend.pages.jobs.joabList',compact('jobs'));
    }
    public function userList()
    {
        $users = User::where('role', 'candidate')->get();
        return view('backend.pages.users.userList', compact('users'));
    }

    public function companyList()
    {
        $companies = User::where('role', 'company')->get();

        return view('backend.pages.users.companyList', compact('companies'));
    }

    public function ApplicationList(){
        $applicationLists = JobApplication::with('job')->orderBy('created_at','asc')->get();
        // dd($applicationLists);
        return view('backend.pages.jobs.application',compact('applicationLists'));
    }
    public function jobapplicationDestory($id){
        $application = JobApplication::find($id);
       if($application){
        $application->delete();
        return redirect()->back()->with('success','Successfuly Remove Job Application');
       }else{
        return redirect()->back()->with('error','Job not found.');
       }
    }

    public function jobCreate(){
        $jobCategories = JobCategory::orderBy('name','ASC')->where('status',1)->get();
        $jobTypes = JobType::orderBy('name','ASC')->where('status',1)->get();
        return view('backend.pages.jobs.jobCreate',compact('jobCategories','jobTypes'));
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
            'apply_before'=>'required',
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
        return redirect()->route('admin.jobList')->with('status','Job post Successfull');
    }
    public function jobEdit(Request $request,$id){
        $jobs = Job::where('id',$id)->first();
        $jobCategories = JobCategory::orderBy('name','ASC')->where('status',1)->get();
        $jobTypes = JobType::orderBy('name','ASC')->where('status',1)->get();
        return view('backend.pages.jobs.jobEdit',compact('jobs','jobCategories','jobTypes'));
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
            'apply_before'=>'required',
            'website'=>'required',

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
        $job->status =$request->status;
        $job->apply_before = $request->apply_before;
        $job->features_at =(!empty($request->features_at)) ? $request->features_at : 0;
        $job->save();
        return redirect()->route('admin.jobList')->with('status','Job Update Successfull');
    }

    public function jobDestory($id){
        $job = Job::find($id);
       if($job){
        $job->delete();
        return redirect()->back()->with('success','Successfuly Remove Job Application');
       }else{
        return redirect()->back()->with('error','Job not found.');
       }
    }


    public function contactFormList(){
        $contactForm = Contact::all();
        return view('backend.pages.contactFormList',compact('contactForm'));
    }
    public function contactFormView(Request $request){
        $contactView = Contact::where('id',$request->id)->first();

        return view('backend.pages.contactFormView',compact('contactView'));
    }

    public function contactFormDestory($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('success','Successfully Deleted Data');
    }

}
