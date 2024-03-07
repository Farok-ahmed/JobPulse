<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    
    public function blogCreate(){
        return view('backend.pages.blog.blogCreate');
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
}
