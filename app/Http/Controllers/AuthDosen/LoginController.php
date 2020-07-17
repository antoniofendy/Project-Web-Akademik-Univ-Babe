<?php

namespace App\Http\Controllers\AuthDosen;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:dosen')->except('logout');
    }

    public function showLoginForm(){

        return view('authDosen.login');

    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('dosen')->attempt($credentials, $request->member)){

            return redirect()->intended(route('dosen.home'));

        }

        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function Request(){
        dd("Hello World");
    }

}
