<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest', ['except' => 'logout']);
    }

    public function log(Request $request)
    {
        $this->login($request);
        return redirect(route('dashboard'));

    }

    public function login(Request $request)
    {
        if(Auth::guest()){

            if (Auth::attempt($this->credentials($request)/*,$validatedRequest->has('remember')*/)) {

                return redirect()->intended(route('dashboard'));
            }

            return back()->withErrors('Sorry !!! your email or password is invalid');

        }

        return redirect()->intended(route('dashboard'));


    }
    public function credentials($request){

        return [

            'email' => $request->email,

            'password' => $request->password/*,'status'=>'active'*/
        ];
    }

    public function lgout(Request $request)
    {
        $this->logout($request);

        return redirect(route('index'));


    }

    public function loginPage()
    {
        return view('frontend.login');
    }


}
