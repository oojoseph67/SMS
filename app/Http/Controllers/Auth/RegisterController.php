<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/regPage';
    protected $redirectTo = '/student/';

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
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required'],
            'gender' => ['required'],
            'class' => ['required'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_email' => ['required', 'string', 'email'],
            'guardian_phoneNumber' => ['required'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'passport' => ['required', 'mimes:jpeg,png,gif,jpg', 'max:2048'],
            'manuscript' => ['required', 'mimes:pdf,doc,txt,docx', 'max:10024']
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

        // $randomstring = rand();
        // $rand = "bbia/".$randomstring;
        // $password_secure = Hash::make('password');
        
       $passport = $data['passport'];
       $passport_new_name = rand().".".$passport->getClientOriginalExtension();
       $passport->move(public_path("img/passport"), $passport_new_name);

       $manuscript = $data['manuscript'];
       $manuscript_new_name = rand().".".$manuscript->getClientOriginalExtension();
       $manuscript->move(public_path("img/manuscript"), $manuscript_new_name);

       $guardian_phoneNumber = $data['guardian_phoneNumber'];
       $class = $data['class'];

       $random_number = intval(rand(0,9).rand(0,9));
       $random_string = chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90));

        return User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'entry_class' => $class,
            'current_class' => $class,
            'guardian_name' => $data['guardian_name'],
            'guardian_email' => $data['guardian_email'],
            'guardian_phoneNumber' => ('+').$guardian_phoneNumber,
            'password' => Hash::make($data['password']),
            'student_id' => ('bbia/').$random_number.$random_string,
            'profile_pic' => $passport_new_name,
            'manuscript' => $manuscript_new_name,
            'reg_payment' => ['NOTPAID'],
            'school_fees_payment' => ['NOTPAID'],       
            'pta_fees_payment' => ['NOTPAID'],
        ]);

    }
}
