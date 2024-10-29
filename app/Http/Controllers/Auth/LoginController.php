<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;


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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email',$request['email'])->first(); //Auth::user();
            // Check if the userPrivilege matches the selected radio button
            if ($user->userPrivilege == $request->input('userPrivilege')) {
                return $this->sendLoginResponse($request);
            } else {
                Auth::logout(); // Log out the user if privileges do not match
                return back()->withErrors([
                    'email' => __('auth.wrongPrivilege'),
                ]);
            }
        }

        return $this->sendFailedLoginResponse($request);
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        return redirect()->intended($this->redirectTo);
    }

}
