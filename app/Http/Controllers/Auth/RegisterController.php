<?php

namespace App\Http\Controllers\Auth;

use App\Plan;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            'package'=>'required',
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

    private function chargeUser(User $user,$token,Plan $plan)
    {
        try  {

            \Stripe\Stripe::setApiKey("sk_test_ti1XFrcR7QnUntyrFHs9wYvq");

            $packagePrice =  isset($plan)?($plan->price)*100:45*100;
            $customer = \Stripe\Customer::create(array(
                "source" => $token,
                "email" => $user->email,
                "coupon" => $user->coupon_code
            ));

//            $coupon = \Stripe\Customer::retrieve($customer->id);

            if(isset($customer->discount->coupon->amount_off) ){

                $packagePrice = $packagePrice - $customer->discount->coupon->amount_off;

            }

            if (isset($customer->discount->coupon->percent_off)) {

                $packagePrice =$packagePrice - $packagePrice*($customer->discount->coupon->percent_off)/100;
            }

            $charged = \Stripe\Charge::create(array(
                'customer'=>$customer->id,
                "amount" => $packagePrice,
                "currency" => "usd",
                "description" => "Charge for ".$user->email
            ));

            $user->is_charged = true;

            if ($user->save()) {

                Auth::login($user);


            }


        } catch (Exception $e) {

            return $e;
        }
    }

    public function register(Request $request, User $user, Plan $plan)
    {

        $this->validator($request->all())->validate();

        $plan = $request->has('package')?$plan->getPlan($request->package):null;
        $user->plan_id = isset($plan)?$plan->id:0;
        $user->email = $request->has('email')?$request->email:'test@test.com';
        $user->password = $request->has('password')?bcrypt($request->password):bcrypt(123456);
        $user->first_name = $request->has('first_name')?$request->first_name:null;
        $user->last_name = $request->has('last_name')?$request->last_name:null;
        $user->coupon_code =$request->has('coupon_code')? $request->coupon_code:null;
        $token = $request->input('stripeToken');

        DB::transaction(function()use($user,$token,$plan){

           $this->chargeUser($user,$token,$plan);

        });


        return redirect(route('dashboard'));

    }
}
