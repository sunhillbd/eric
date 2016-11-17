<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function __construct()
    {

    }

    public function getPaymentForm()
    {
        return view('frontend.payment')->with('register',true);
    }

    public function pay(Request $request, Plan $plan)
    {
        $user = auth()->user();
        $plan = $user->plan;
        $user->coupon_code =$request->has('coupon_code')? $request->coupon_code:null;
        $token = $request->input('stripeToken');

        DB::transaction(function()use($user,$token,$plan){

            $this->chargeUser($user,$token,$plan);
            $user->update([
                'plan_id'=>$plan->id,
                'coupon_code'=>$user->coupon_code,
                'is_charged'=>true
            ]);
        });

        return redirect(route('dashboard'))->withSuccess('Congrats!!! Your Payment is Done. So You can Proceed now.....');


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



        } catch (Exception $e) {

            return $e;
        }

    }
}
