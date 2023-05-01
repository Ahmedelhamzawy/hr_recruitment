<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{




    protected $redirectTo = '/';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function registerForm()
    {
        return view('auth.register');
    }
    public function create(RegisterRequest $request)
    {
        if($request->input('user_type') == 'user_type'){
            return back()->withErrors([ 'please select a user type']);
        }
        if ($request->input('user_type') == 'applicant') {
            $applicant = Applicant::create([
                'username' =>  $request->input('username'),
                'password' => bcrypt($request->input('password')),
            ]);
            return redirect()->route('login');
        } else {
            $recruiter = Recruiter::create([
                'username' =>  $request->input('username'),
                'password' => bcrypt($request->input('password')),
            ]);
            return redirect()->route('login');
        }
    }


    public function loginForm()
    {
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {


        if (auth()->guard('recruiter')->attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {

            $id = auth()->guard('recruiter')->user();
            return redirect()->route('recruiter');
        } elseif (auth()->guard('applicant')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            $id = auth()->guard('applicant')->user();
            return redirect()->route('applicant');
        } else {
            return back()->withErrors(['The username or password you have entered are wrong.']);
        }
    }
    public function logout(){
        if(Auth::guard('applicant')->check()){
            Auth::guard('applicant')->logout();
        }else{
  
            Auth::guard('recruiter')->logout();
        }
      return redirect('/home');
    }

}
