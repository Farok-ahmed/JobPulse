<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function blogCreate(){
        return view('backend.pages.blog.blogCreate');
    }

    public function blogAdminList(){
        $blogAdmiList = Blog::all();
        return view('backend.pages.blog.blogList',compact('blogAdmiList'));
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

    public function blogAdminEdit($id){
        $blog = Blog::where('id',$id)->first();
        return view('backend.pages.blog.blogEdit',compact('blog'));
    }
    public function blogAdminUpdate(Request $request,$id){

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
    public function BlogAdminPanelDestory($id){
        $blog = Blog::where('id',$id)->first();
        $blog->delete();
        return redirect()->back()->with('success','Blog post Successfuly Delete');
    }
}
