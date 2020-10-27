<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use Auth;
use App\Invoice;
use App\User;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }


    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;
        $random_number = intval(rand(0,9).rand(0,9).rand(0,9).rand(0,9));

        $user = DB::table('users')->where('id' , $user_id)->update(['school_fees_payment'  => 'PAID']);

        $invoice = new Invoice;

        $invoice->status = $paymentDetails['data']['status'];
        $invoice->fullname = $paymentDetails['data']['metadata']['fullname'];
        $invoice->email = $paymentDetails['data']['metadata']['email'];
        $invoice->dob = $paymentDetails['data']['metadata']['dob'];
        $invoice->class = $paymentDetails['data']['metadata']['class'];
        $invoice->term = $paymentDetails['data']['metadata']['term'];
        $invoice->gender = $paymentDetails['data']['metadata']['gender'];
        $invoice->student_id = $paymentDetails['data']['metadata']['student_id'];
        $invoice->guardian_name = $paymentDetails['data']['metadata']['guardian_name'];
        $invoice->guardian_email = $paymentDetails['data']['metadata']['guardian_email'];
        $invoice->guardian_phoneNumber = $paymentDetails['data']['metadata']['guardian_phoneNumber'];
        $invoice->school_fees_price = $paymentDetails['data']['amount'];
        $invoice->section = $paymentDetails['data']['metadata']['section'];
        $invoice->order_number = $random_number;
        $invoice->order_date = $paymentDetails['data']['paid_at'];
        $invoice->fee_type = 'SCHOOLFEES';

        $invoice->save();
        
        return view('user.paymentsuccess');

        // return redirect('/student');

        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }


    public function handleGatewayCallbackPta()
    {
        $paymentDetails = Paystack::getPaymentData();

        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;
        $random_number = intval(rand(0,9).rand(0,9).rand(0,9).rand(0,9));

        $user = DB::table('users')->where('id' , $user_id)->update(['pta_fees_payment'  => 'PAID']);
        
        // return redirect('/student');

        // dd($paymentDetails['data']);

        $invoice = new Invoice;

        $invoice->status = $paymentDetails['data']['status'];
        $invoice->fullname = $paymentDetails['data']['metadata']['fullname'];
        $invoice->email = $paymentDetails['data']['metadata']['email'];
        $invoice->dob = $paymentDetails['data']['metadata']['dob'];
        $invoice->class = $paymentDetails['data']['metadata']['class'];
        $invoice->term = $paymentDetails['data']['metadata']['term'];
        $invoice->gender = $paymentDetails['data']['metadata']['gender'];
        $invoice->student_id = $paymentDetails['data']['metadata']['student_id'];
        $invoice->guardian_name = $paymentDetails['data']['metadata']['guardian_name'];
        $invoice->guardian_email = $paymentDetails['data']['metadata']['guardian_email'];
        $invoice->guardian_phoneNumber = $paymentDetails['data']['metadata']['guardian_phoneNumber'];
        $invoice->pta_fees_price = $paymentDetails['data']['amount'];
        $invoice->section = $paymentDetails['data']['metadata']['section'];
        $invoice->order_number = $random_number;
        $invoice->order_date = $paymentDetails['data']['paid_at'];
        $invoice->fee_type = 'PTAFEES';

        $invoice->save();


        return view('user.paymentsuccess');
        
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function handleGatewayCallbackReg()
    {
        $paymentDetails = Paystack::getPaymentData();

        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;
        $random_number = intval(rand(0,9).rand(0,9).rand(0,9).rand(0,9));

        $user = DB::table('users')->where('id' , $user_id)->update(['reg_payment'  => 'PAID']);
        
        // return redirect('/student');

        // dd($paymentDetails['data']);

        $invoice = new Invoice;

        $invoice->status = $paymentDetails['data']['status'];
        $invoice->fullname = $paymentDetails['data']['metadata']['fullname'];
        $invoice->email = $paymentDetails['data']['metadata']['email'];
        $invoice->dob = $paymentDetails['data']['metadata']['dob'];
        $class = $invoice->class = $paymentDetails['data']['metadata']['class'];
        $invoice->term = $paymentDetails['data']['metadata']['term'];
        $invoice->gender = $paymentDetails['data']['metadata']['gender'];
        $invoice->student_id = $paymentDetails['data']['metadata']['student_id'];
        $invoice->guardian_name = $paymentDetails['data']['metadata']['guardian_name'];
        $invoice->guardian_email = $paymentDetails['data']['metadata']['guardian_email'];
        $invoice->guardian_phoneNumber = $paymentDetails['data']['metadata']['guardian_phoneNumber'];
        $invoice->reg_fees_price = $paymentDetails['data']['amount'];
        $invoice->section = $paymentDetails['data']['metadata']['section'];
        $invoice->order_number = $random_number;
        $invoice->order_date = $paymentDetails['data']['paid_at'];
        $invoice->fee_type = 'REGFEES';
        
        $invoice->save();

        $details = DB::table('users')->where ('id', $user_id)->update(['current_class' => $class]);

        return view('user.paymentsuccess');
        
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function handleGatewayCallbackLesson()
    {
        $paymentDetails = Paystack::getPaymentData();

        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;
        $random_number = intval(rand(0,9).rand(0,9).rand(0,9).rand(0,9));

        $user = DB::table('users')->where('id' , $user_id)->update(['lesson_fees_payment'  => 'PAID']);
        
        // return redirect('/student');

        // dd($paymentDetails['data']);

        $invoice = new Invoice;

        $invoice->status = $paymentDetails['data']['status'];
        $invoice->fullname = $paymentDetails['data']['metadata']['fullname'];
        $invoice->email = $paymentDetails['data']['metadata']['email'];
        $invoice->dob = $paymentDetails['data']['metadata']['dob'];
        $class = $invoice->class = $paymentDetails['data']['metadata']['class'];
        $invoice->term = $paymentDetails['data']['metadata']['term'];
        $invoice->gender = $paymentDetails['data']['metadata']['gender'];
        $invoice->student_id = $paymentDetails['data']['metadata']['student_id'];
        $invoice->guardian_name = $paymentDetails['data']['metadata']['guardian_name'];
        $invoice->guardian_email = $paymentDetails['data']['metadata']['guardian_email'];
        $invoice->guardian_phoneNumber = $paymentDetails['data']['metadata']['guardian_phoneNumber'];
        $invoice->lesson_fees_price = $paymentDetails['data']['amount'];
        $invoice->section = $paymentDetails['data']['metadata']['section'];
        $invoice->order_number = $random_number;
        $invoice->order_date = $paymentDetails['data']['paid_at'];
        $invoice->fee_type = 'LESSONFEES';
        
        $invoice->save();

        return view('user.paymentsuccess');
        
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}