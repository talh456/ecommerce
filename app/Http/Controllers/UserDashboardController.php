<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //
    public function index()
    {
        if(Session::has('user'))
        {
        return view('user.dashboard');
        }
        else
        {
            return redirect('user_login');
        }
    }
}
