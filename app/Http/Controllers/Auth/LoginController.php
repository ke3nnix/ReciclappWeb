<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function authenticate()
    // {
    //     if (Auth::attempt(['email' => $email, 'password' => $password, 'tipo' => 3])) {
    //         // Authentication passed...
    //         return redirect()->intended('dashboard');
    //     }
    // }

    public function login()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }

    public function authenticate(Request $request)
    {
       $credentials = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'tipo' => 3
        );

        if (Auth::attempt($credentials)) 
        {
            return redirect()->route('inicio');
        }
        else
        {
            Session::flash('error' , 'Credenciales erróneas y/o sin permisos suficientes');
            return redirect()->route('login');
        }
    }

}
