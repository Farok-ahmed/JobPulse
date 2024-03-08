<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Blog;
use App\Models\User;
use App\Models\Contact;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Models\ContactPageInformation;

class HomeController extends Controller
{
    public function home(){
        $jobCategories = JobCategory::where('status',1)->take(8)->get();
        $jobCountCategories = Job::orderBy('created_at','DESC')->with('JobCategory')->count();


        $jobs = Job::where('status',1)->where('features_at',1)
        ->with('jobType')->take(6)->get();
        $blogList = Blog::orderBy('created_at','DESC')->take(3)->get();
        return view('frontend.pages.home',compact('jobCategories','jobCountCategories','jobs','blogList'));
    }
    public function about(){

        return view('frontend.pages.about');
    }

    // Contact Page


    public function contact(){
        $contactInformation = ContactPageInformation::first();
        return view('frontend.pages.contact',compact('contactInformation'));
    }
    public function contactPageInformationCreate(){
        $contactInformation = ContactPageInformation::first();
        return view('backend.pages.contactPage.contactPageCreate',compact('contactInformation'));
    }
    public function contactPageInformationStore(Request $request){
        $request->validate([
            'title'=>'required',
            'email'=>'required',
            'email2'=>'required',
            'phone'=>'required',
            'phone2'=>'required',
            'location'=>'required',
        ]);
        $obj = ContactPageInformation::where('id',1)->first();
        $obj->title = $request->title;
        $obj->email = $request->email;
        $obj->email2 = $request->email2;
        $obj->phone = $request->phone;
        $obj->phone2 = $request->phone2;
        $obj->location = $request->location;
        $obj->update();

        return redirect()->back()->with('success','Contact Page information Successfuly Add');
    }
    public function contactPageInformationEdit($id){
        return view('backend.pages.contactPage.contactPageCreate');
    }

    public function contactStore(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        $contact = new Contact();
        $contact->name =$request->name;
        $contact->email =$request->email;
        $contact->phone =$request->phone;
        $contact->subject =$request->subject;
        $contact->message =$request->message;
        $contact->save();
        return redirect()->back()->with('success','You Form Successfuly Submited');
    }


    public function blog(Request $request){
        $blogList = Blog::orderBy('created_at','ASC')->with('User')->paginate(6);
        //dd($blogList);
        return view('frontend.pages.blog',compact('blogList'));
    }

    public function blogSingle($id){
        $blogSingle = Blog::where('id',$id)->first();

        $latestBlogs = Blog::orderBy('created_at','DESC')->take(4)->get();

        return view('frontend.pages.blogSingle',compact('blogSingle','latestBlogs'));
    }

}
