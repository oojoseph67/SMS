<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegisterIntoSMS extends Controller
{

    public function staff(Request $request)
    {
        $this->validate($request,[
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneNumber' => ['required', 'max:10'],
            'dob' => ['required'],
            'gender' => ['required'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_email' => ['required', 'string', 'email'],
            'guardian_phoneNumber' => ['required'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'passport' => ['required', 'mimes:jpeg,png,gif,jpg', 'max:2048'],
            'cv' => ['required', 'mimes:pdf,doc,txt,docx', 'max:10024']
        ]);

        // $randomstring = rand();
        // $rand = "bbia/".$randomstring;
        // $password_secure = Hash::make('password');
        
       $passport = $request->file('passport');
       $passport_new_name = rand().".".$passport->getClientOriginalExtension();
       $passport->move(public_path("img/profile_pic"), $passport_new_name);

       $cv = $request->file('cv');
       $cv_new_name = rand().".".$cv->getClientOriginalExtension();
       $cv->move(public_path("img/cv"), $cv_new_name);
        
       $phoneNumber = $request->input('phoneNumber');
       $guardian_phoneNumber = $request->input('guardian_phoneNumber');


       $random_number = intval(rand(0,9).rand(0,9));
       $random_string = chr(rand(65,90));

        $user_details = new User;

        $user_details->fullname = $request->input('fullname');
        $user_details->email = $request->input('email');
        $user_details->staff_phoneNumber = ('+').$phoneNumber;
        $user_details->dob = $request->input('dob');
        $user_details->gender = $request->input('gender');
        $user_details->guardian_name = $request->input('guardian_name');
        $user_details->guardian_email = $request->input('guardian_email');
        $user_details->guardian_phoneNumber = ('+').$guardian_phoneNumber;
        $user_details->password = Hash::make($request->input('password'));
        $user_details->staff_id = ('bbia/staff/').$random_number.$random_string;
        $user_details->role = $request->input('role');
        $user_details->profile_pic = $passport_new_name;
        $user_details->cv = $cv_new_name;

        $user_details->save();

        //return view('auth.reg_success');

        return redirect()->route('teacher.home');
    }


}
