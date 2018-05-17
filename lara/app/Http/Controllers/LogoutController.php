<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;

class LogoutController extends Controller
{
    public function logout() {
        Session::forget('student_id');
        return Redirect::to('/');
    }
}