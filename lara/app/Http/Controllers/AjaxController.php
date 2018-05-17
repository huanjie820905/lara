<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{
    public function query(Request $request) {
        $lesson=DB::table('lesson')->where('department',$request->department)->get();
        return response()->json(['lesson'=>$lesson], 200);
    }
}