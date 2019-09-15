<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule;
use App\User as User;

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
    }

    public function showLoginForm()
    {
        return render('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
\Log::info('oke');
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
	\Log::warning('Error Login');

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password','status','level');
    }

    protected function validateLogin(Request $request)
    {
        \Log::info('Validating ...');
        $o = $request->validate([
            $this->username() => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    public function authenticated(Request $request, $user)
    {
        \Log::info('authenticating....');
        if (!$user->groups()
                  ->where('groupname',['user','admin','operator','sales'])
                  ->first()) {
            auth()->logout();
            return back()->with('warning', 'You are not authorized to access this page');
        }
        if ($user->status=='D') {
            auth()->logout();
            return back()->with('warning', 'Your status is disabled. Call administrator for this case');
        }
        return redirect()->intended($this->redirectPath());
    }

}
