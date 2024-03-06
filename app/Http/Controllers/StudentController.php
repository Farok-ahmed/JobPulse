<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudent(){
        $students = DB::table('students')->paginate(10);

        return view('student',['data'=>$students]);
    }
     public function singleStudent($id){
        $students = DB::table('students')->where('id',$id)->get();
        //return $students;
        return view('slinglestudent',['data'=>$students]);
    }
    public function addStudent(Request $request){
        $students = DB::table('students')->insert([
            'name'=>$request->studentName,
            'email'=>$request->studentEmail,
            'city'=>$request->city,
            'age'=>$request->studentAge,
            'country'=>$request->country,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
    }

}
