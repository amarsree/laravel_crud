<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showChangePasswordForm(){
        return view('auth.passwords.changepassword');
    }


    public function ChangePassword(Request $request){
       
        if ((Hash::check($request->old, \Auth::user()->password)) )
        {
            if( $request->newpass == $request->newpass_conf){

                $this->passwordupdate($request);
                return redirect('product')->with("msg", "pass word updated");
            }

        };
        return redirect('product')->with("msg", "check passwords AGAIN");
    }


    public function passwordupdate($req)
    {
        \App\User::where('id', $req->id)->update([
        'password'=> $req->newpass,
    ]);
    }


}
