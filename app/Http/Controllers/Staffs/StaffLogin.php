<?php

namespace App\Http\Controllers\Staffs;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StaffLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Str;
use App\Http\Controllers\Auth\Events;

use App\Models\Admin\StaffAuth;
class StaffLogin extends Controller
{

                /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function dashboard()
    {
       
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return Inertia::render('Admin/AdminDashboard',[
        
       
               
        ]);
    
    }

    // /**
    //  * Display the login view.
    //  *
    //  * @return \Inertia\Response
    //  */
    // public function create()
    // {   if (Auth::guard('staff')->check()) {
    //     return redirect()->route('staff.dashboard');
    // }
    // else{
    //     return Inertia::render('Admin/AdminLogin', [
    //         'canResetPassword' => Route::has('password.request'),
    //         'status' => session('status'),
    //     ]);
    // }
    // }
    
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\StaffLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StaffLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

      
        return redirect()->intended('/staff/dashboard');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('staff')->logout();

        // dd('asdasd');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Inertia::render('Admin/AdminLogin');
    }


    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {   
        

  
      

    
        $max_filesize = 5000;
        $regx_alpha = '/^[a-zA-Z .ñÑ]+$/';
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'ext_name' => 'nullable|max:10',
            'last_name' => 'required|max:160|regex:'.$regx_alpha,
            'first_name' => 'required|max:160|regex:'.$regx_alpha,
            'mid_name' => 'nullable|max:160|regex:'.$regx_alpha,
            'email' => 'required|string|email|max:255|unique:staff_accounts'],[],['reciept_filename' => 'Attachment','addr_municipality'=>'Municipality', 'contact_no' => 'Mobile Number',
            'membr_since' =>'Member Since', 'membr_type'=> 'Membership Type', 'full_addr' => 'Business Address','nat_employment'=> 'Natural Employment' ,'bplo_func'=>'Scope of BPLO FUNCTION','org_setup'=>'Organizational Setup'
            ,'exec_name'=>"Local Executive Full name",'position'=>'Position','department'=>'Department','last_name'=>'Last Name','first_name'=>'First Name','email'=>'Email', 'paid'=>'Payment Option' , 'membr_fee' => 'Membership Fee', 'membr_filename'=>'Proof of payment for membership'
            , 'eboss'=>'E-boss','topics'=>'Session Topics', 'mempaid'=>'Membership Payment Option'
            
        ]);

        
          
     

   

        if ($request) {
           
            
            
            
            $insert_bene = $request->except(['password']);
         
         


            
            

    
            $user = StaffAuth::create([
        
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'last_name'=>$request->last_name,
                'first_name'=>$request->first_name,
                'mid_name'=>$request->mid_name,
             
            ]);
    
            if ($user) {
                  
                $mi = !empty($request->mid_name) ? implode('', array_map(function($ar) { return $ar[0]; }, explode(' ', $request->mid_name))) : '';
    
    
             $all_caps_exceptionn = ['email'];
    
            
                
    
            
    
        
                
           
    
            }

        
    
        event(new Registered($request));
   
        Auth::login($user);
    

        return redirect(RouteServiceProvider::STAFF_AUTH_HOME);
    }
    }
}
