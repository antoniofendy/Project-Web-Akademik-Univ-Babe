<?php

namespace App\Http\Controllers\AuthMahasiswa;

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
        $this->middleware('guest:mahasiswa')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('authMahasiswa.login');
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
        dd(Auth::guard('mahasiswa')->attempt($credentials, $request->member));
        //Attempt to log user in
        if(Auth::guard('mahasiswa')->attempt($credentials, $request->member)){

            
            //if login successful, then redirect to intended location
            return redirect()->intended(route('mahasiswa.home'));

        }

        //if login unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

}
