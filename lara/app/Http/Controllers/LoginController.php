<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request) {
        $validator=Validator::make($request->all(),['student_id'=>'required|string','password'=>'required|string'],['required'=>'不可為空白','string'=>'格式不正確']);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } else {
            $result=DB::table('student')->where('student_id',$request->student_id)->where('password',$request->password)->get();
            if ($result->all()) {
                session(['student_id'=>$request->student_id]);
                return Redirect::to('/lesson');
            } else {
                return "<script>alert('帳號或密碼錯誤');
                location.href = '';
                </script>";
            }
        }
    }
}