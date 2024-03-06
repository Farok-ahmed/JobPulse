<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $jobCategories = JobCategory::where('status',1)->take(8)->get();
        $jobCountCategories = Job::orderBy('created_at','DESC')->with('JobCategory')->count();


        $jobs = Job::where('status',1)->where('features_at',1)
        ->with('jobType')->take(6)->get();
        return view('frontend.pages.home',compact('jobCategories','jobCountCategories','jobs'));
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
    public function blog(){
        return view('frontend.pages.blog');
    }

}
