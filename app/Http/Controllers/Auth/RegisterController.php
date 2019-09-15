<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\User;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
	\Log::info('country:'.$data['country']);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
	    'refferal' => ['required', 'string', 'min:32'],
	    'country' => ['required','numeric','min:1','max:243'],
	    'phone' => ['required','numeric'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
	$refferer = User::where('affiliate_code',$data['refferal'])->first();
	$refferer_id = !$refferer ? 3 : $refferer->id;
	$group = Group::where('groupname','User')->first();
	$country = Country::findOrFail($data['country']);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
	    'level' => 'User',
	    'affiliate_code' => md5(Hash::make($data['email'])),
	    'reffered_by' => $refferer_id,
	    'icon' => 'blankuser.png',
	    'country' => $data['country'],
	    'phone' => '+('.$country->code.')'.$data['phone'],
        ]);
        return $user;
    }

    public function showRegistrationForm()
    {
	$countries = Country::all();
        if(!\Request::has('reff')||\Request::get('reff')==''){
            $user = User::find(3);
            \Session::regenerate();
            \Session::forget('refferal');
            \Session::put('refferal',$user->affiliate_code);
        }
    	return render('auth.register')->with(compact('countries'));
    }

    public function register(Request $request)
    {
         $this->validator($request->all())->validate();

         event(new Registered($user = $this->create($request->all())));

         //$this->guard()->login($user);

         return $this->registered($request, $user)
                    ?: redirect($this->redirectPath());
    }
}
