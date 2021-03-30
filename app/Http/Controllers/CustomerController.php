<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\UserRegisterRequest;

class CustomerController extends Controller
{
    //
    public function showRegister()
    {
        return view('user.register');
    }

    public function showlogin()
    {
        return view('user.login');
    }

    public function registerUser(UserRegisterRequest $req)
    {
        $validated = $req->validated();
        
        $customer = new customer;
        $customer->name = $req->input("name");
        $customer->email = $req->input("email");
        $customer->password = Crypt::encrypt($req->input("password"));
        $customer->save();
        $req->session()->put('user',$req->input("name"));
        return redirect('/');
    }

    public function loginUser(Request $req)
    {
      $customer =  customer::where('email',$req->input('email'))->get();

      if(Crypt::decrypt($customer[0]->password)==$req->input('password'))
      {
          $req->session()->put('user',$customer[0]->name);
          return redirect('dashboard');
        
      }
        
    }
}
