<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function authenticate(Request $request)
    {

        $requestData = $request->only('email', 'password');
        $passwordField = $requestData['password'];
        $login = $requestData['email'];

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'staff_id';
        }

        // if(is_numeric($login)){
        //     $field = 'contact';
        // } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        //     $field = 'email';
        // } else {
        //     $field = 'staff_id';
        // }


        $credentials = [
            $field => $login,
            'password' => $passwordField,
        ];

        if (Auth::attempt($credentials, 1)) {
            // if success login
            // return redirect('/dashboard');
            return redirect('/home');
        }

        return redirect()->back();
    }



    /**
     * user logout function goes here
     * Logout
     * @method post
     */

    public function Logout(Request $request)
    {

        Auth::logout();

        return response()->json("logout");
    }




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
