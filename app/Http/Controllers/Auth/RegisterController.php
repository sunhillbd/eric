<?php

namespace App\Http\Controllers\Auth;

use App\Mail\EmailVerification;
use App\Mail\ResetPassword;
use App\Plan;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';
    private $authenticatedUser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');


    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'package'=>'required',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * @param Request $request
     * @param User $user
     * @param Plan $plan
     * @return mixed
     */
    public function register(Request $request, User $user, Plan $plan)
    {

        $this->validator($request->all())->validate();


        $user->first_name = $request->has('first_name')?$request->first_name:null;
        $user->last_name = $request->has('last_name')?$request->last_name:null;
        $user->email = $request->has('email')?$request->email:'test@test.com';
        $user->password = $request->has('password')?bcrypt($request->password):bcrypt(123456);
        $user->activation_code = str_random(30);




        DB::transaction(function()use($user){

            if ($user->save()) {

                Auth::login($user);
            }

            Mail::to($user)->send(new EmailVerification($user));
        });

        return redirect(route('payment'))->withSuccess('Congrats!!! Your registration is done. One more step to go. Please, choose your package and pay accordingly to have a journey with us. Best of Luck ...');
    }


    /**
     * @param $activationCode
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function activeUser($activationCode, User $user)
    {
        $userToActivate = $user->whereActivationCode($activationCode)->first();

        if(!is_null($userToActivate)){

            $userToActivate->update([

                'activation_code'=>null,
                'is_active'=>true,
            ]);
        }

        return redirect(route('dashboard'))
                        ->withSuccess('Congrats !!! Your activation process is successful');
    }

    public function resetPassword(Request $request, User $user)
    {
        $message = null;
        $userToResetPassword = $user->whereEmail($request->email)->first();

        if(!is_null($userToResetPassword)){


            $userToResetPassword->update([
                'password_reset_token'=>str_random(30)
            ]);

            Mail::to($userToResetPassword)->send(new ResetPassword($userToResetPassword));


            $message = 'Please Check your email to reset your password';
        }else{
            $message = 'your email is not found';
        }

        return redirect(route('auth.login'))->withSuccess($message);

    }

    public function getPasswordResetForm($passwordResetToken)
    {
        return view('frontend.dashboard.reset-password', compact('passwordResetToken'));
    }
    public function updatePassword(Request $request, User $user)
    {
        $userToResetPassword = $user->wherePasswordResetToken($request->reset_pass_token)->first();

        if(!is_null($userToResetPassword)){

            $userToResetPassword->update([

                'password'=>bcrypt($request->password),
                'password_reset_token'=>null
            ]);
        }

        return redirect(route('auth.login'))->withSuccess('You can login with your new password');
    }

    public function upPassword(Request $request, User $user)
    {

              auth()->user()->update([

                  'password'=>bcrypt($request->new_password)
              ]);

        Auth::logout();
        return redirect(route('auth.login'))->with('login with new password');

    }
}
