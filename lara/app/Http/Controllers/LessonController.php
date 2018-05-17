<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Validator;

class LessonController extends Controller
{
    public function show() {
        if (session()->exists('student_id')){
            $student_id=session()->get('student_id');
            $student_lesson=DB::table('student_lesson')->join('student','student_lesson.student_id','student.student_id')->join('lesson','student_lesson.lesson_id','lesson.lesson_id')->where('student_lesson.student_id',$student_id)->get();
            $student=DB::table('student')->where('student_id',$student_id)->get();
            $department=DB::table('department')->get();
            $lesson=DB::table('lesson')->get();
            return view('lesson',['student_lesson'=>$student_lesson,'student'=>$student,'department'=>$department,'lesson'=>$lesson]);
        }
    }

    public function add(Request $request) {
    	$validator=Validator::make($request->all(),['department'=>'required','lesson'=>'required'],['required'=>'你還沒選擇']);
    	if ($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } else {
        	$student_id=session()->get('student_id');
        	$check=DB::table('student_lesson')->where('student_id',$student_id)->where('lesson_id',$request->lesson)->get();
        	if ($check->all()){
        		return "<script>alert('你已經選過這門課了!');
        		location.href = '';
        	    </script>";
        	}else{
        		DB::table('student_lesson')->insert(['student_id'=>$student_id,'lesson_id'=>$request->lesson]);
        		return Redirect::action('LessonController@show');
        	}
        }
    }

    public function delete($lesson_id) {
    	$student_id=session()->get('student_id');
    	DB::table('student_lesson')->where('student_id',$student_id)->where('lesson_id',$lesson_id)->delete();
    	return Redirect::action('LessonController@show');
    }
}