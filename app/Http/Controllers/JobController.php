<?php

namespace App\Http\Controllers;

use to;
use App\Models\Job;
use App\Models\User;
use App\Models\SaveJob;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Mail\JobNotificationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class JobController extends Controller
{
    public function job(Request $request)
    {
        $jobs = Job::where('status', 1)->with('jobType')->with('JobCategory')->orderBy('created_at', 'DESC')->paginate(10);

        // Jobs search

        $job_title = $request->input('title');
        $job_location = $request->input('location');

        $searchs = Job::where('title','like','%$job_title')
        ->where('location','like','%$job_location')->get();

        return view('frontend.pages.job', compact('jobs','searchs'));
    }
    public function jobDetail(Request $request, $id)
    {
        $jobs = Job::where('id', $id)
            ->with('User')
            ->with('jobType')->with('JobCategory')->first();
        return view('frontend.pages.jobDetails', compact('jobs'));
    }

    public function downloadCV($id){
        $cvUpload = JobApplication::where('id',$id)->first();
        $filepath = public_path("uploads/{$cvUpload->cv}");
        return Response::download($filepath);
    }

    public function applyJob(Request $request)
    {
        $id = $request->id;
        $job = Job::where('id', $id)->first();
        if ($job == null) {
            return redirect()->back()->with('failed', 'job dose not exist');
        }


        // you can not apply on you own job
        $employer_id = $job->user_id;

        if ($employer_id == Auth::user()->id) {
            return redirect()->back()->with('failed', 'you can not apply on you own job');
        }

        // You cand not apply on a job twise

        $jobApplicationCount = JobApplication::where([
            'user_id' => Auth::user()->id,
            'job_id' => $id
        ])->count();

        if ($jobApplicationCount > 0) {
            return redirect()->back()->with('failed', 'You alread Applied On this Job');
        }
        if(Auth::user()->cv == 'no cv'){
            return redirect()->back()->with('failed','Upload your CV First in Profile Page');
        }else{

        // Create a new job application
        $application = new JobApplication();
        $application->job_id = $request->job_id;
        $application->employer_id = $request->employer_id;
        $application->user_id = Auth::id();
        $application->applied_date = now();
        $application->cv = Auth::user()->cv;
        $application->save();

        // job notification Email to Employee
        $employer = User::where('id',$employer_id)->first();
        $mailData = [
            'employer'=>$employer,
            'user'=>Auth::user(),
            'job'=>$job
        ];
        Mail::to($employer->email)->send(new JobNotificationEmail($mailData));

        return redirect()->back()->with('success', 'You have successfully applied.');
    }
    }

    public function saveJobList()
    {
        $saveJobList = SaveJob::where('user_id', Auth::user()->id)->get();
        return view('candidate.pages.saveJobList', compact('saveJobList'));
    }
    public function saveJob(Request $request)
    {
        $id = $request->id;
        $job = Job::where('id', $id)->first();

        $saveJobCount = SaveJob::where([
            'user_id' => Auth::user()->id,
            'job_id' => $id
        ])->count();

        if ($saveJobCount > 0) {
            return redirect()->back()->with('failed', 'You alread Save On this Job');
        }

        // Save a new job application
        $saveJob = new SaveJob();
        $saveJob->job_id = $request->job_id;
        $saveJob->employer_id = $request->employer_id;
        $saveJob->user_id = Auth::id();
        $saveJob->save_date = now();
        $saveJob->save();

        return redirect()->back()->with('success', 'Job Successfuly Save');
    }

    // // Job search Function Start

    // public function search(Request $request){
    //     $job_title = $request->get('job_title');
    //     $job_location = $request->get('job_location');
    //     $searchs = Job::select()->where('title','like','%$job_title')
    //     ->where('location','like','%$job_location')->get();


    // }
}
