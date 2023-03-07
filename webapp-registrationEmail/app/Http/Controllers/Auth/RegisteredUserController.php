<?php

namespace App\Http\Controllers\Auth;

use App\Models\NOC;
use app\Models\Plan;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use App\Models\JoiningLetter;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Models\GenerateOfferLetter;
use App\Http\Controllers\Controller;
use App\Jobs\registrationSuccessful as JobsRegistrationSuccessful;
use App\Jobs\regSuccessNotifyAdmin as JobsRegSuccessNotifyAdmin;
use App\Mail\registrationSuccessful;
use App\Mail\regSuccessNotifyAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\ExperienceCertificate;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if(env('RECAPTCHA_MODULE') == 'yes')
        {
            $validation['g-recaptcha-response'] = 'required|captcha';
        }else{
            $validation=[];
        }
        $this->validate($request, $validation);
       
       
        
        $default_language = \DB::table('settings')->select('value')->where('name', 'default_language')->first();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
             
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'company',
            'lang' => !empty($default_language) ? $default_language->value : '',
            'plan' => 1,
            'created_by' => 1,
        ]);

   
                $name =  $user->name;
                $email =  $user->email;
                $adminEmail = 'info@reposebayhr.com';
               // $adminEmail = 'asubiojoolujuwon@gmail.com';
                $companies = User::where('type', '=', 'company')->count();
      
        JobsRegistrationSuccessful::dispatch($user->name,$user->email);
        JobsRegSuccessNotifyAdmin::dispatch($user->name,$adminEmail,$companies,$email);
        
        $role_r = Role::findByName('company');
        $user->assignRole($role_r);
        $user->userDefaultDataRegister($user->id);
        GenerateOfferLetter::defaultOfferLetterRegister($user->id);
        ExperienceCertificate::defaultExpCertificatRegister($user->id);
        JoiningLetter::defaultJoiningLetterRegister($user->id);
        NOC::defaultNocCertificateRegister($user->id);


                
        event(new Registered($user));
         
        Auth::login($user);


        return redirect(RouteServiceProvider::HOME);

    }

    public function showRegistrationForm($lang = '')
    {
        if(empty($lang))
        {
            $lang = Utility::getValByName('default_language');
        }

        \App::setLocale($lang);
        if(Utility::getValByName('disable_signup_button')=='on'){
            return view('auth.register', compact('lang'));
        }
        else{
            return abort('404', 'Page not found');
        }
    }
}
