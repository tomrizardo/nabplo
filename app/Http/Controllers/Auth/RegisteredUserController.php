<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Str;
use App\Http\Controllers\Auth\Events;
use App\Models\Participants;
use App\Models\Municipality;
use App\Models\Attachments;
use Storage;

use DB;
class RegisteredUserController extends Controller
{


   
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $recent_app_listing = DB::table('test')->orderBy('municipality')->get();
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return Inertia::render('Registers',[
           'municipality'=>$recent_app_listing

        ]);
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
        

  
      

    
        $max_filesize = 5000;
        $regx_alpha = '/^[a-zA-Z .ñÑ]+$/';
        $request->validate([
            
            'contact_no' => 'required|numeric|digits:11|unique:participants',
            'ext_name' => 'nullable|max:10',
            'last_name' => 'required|max:160|regex:'.$regx_alpha,
            'first_name' => 'required|max:160|regex:'.$regx_alpha,
            'mid_name' => 'nullable|max:160|regex:'.$regx_alpha,
            // 'addr_region' => 'nullable|max:160',
            'addr_municipality' => 'required|max:160',
            // 'addr_province' => 'nullable|max:160',
            'department' => 'required|max:160',
            'position' => 'required|max:160',
            'org_setup' => 'required|max:30',
            'bplo_func' => 'required|max:160',
            'membr_filename'=> ['required_if:mempaid,Paid','nullable','max:'.$max_filesize, 'mimes:jpeg,jpg,png'],
            'nat_employment' => 'required|max:60',
            'addr_type' => 'max:160',
            'others_org'=>['nullable','required_if:bplo_func,Others'],
            'lgu_class'=>'max:160',
            'paid'=>'required|max:30',
            'eboss'=>'required|max:120',
            'topics'=>'required|max:120',
            'exec_name' => 'required|max:160'.$regx_alpha,
            'full_addr' => 'required|max:255',
            'membr_type' => 'required|max:160',
                'membr_fee' => ['required_if:mempaid,Paid','nullable','max:160'],
			'mempaid' => 'required|max:30',
            'membr_since' => ['nullable', 'required_if:membr_type,Renewal','max:20'],
            'reciept_filename' => ['required_if:paid,Paid','nullable', 'max:'.$max_filesize, 'mimes:jpeg,jpg,png'],
            'email' => 'required|string|email|max:255|unique:participants'],[],['reciept_filename' => 'Attachment','addr_municipality'=>'Municipality', 'contact_no' => 'Mobile Number',
            'membr_since' =>'Member Since', 'membr_type'=> 'Membership Type', 'full_addr' => 'Business Address','nat_employment'=> 'Natural Employment' ,'bplo_func'=>'Scope of BPLO FUNCTION','org_setup'=>'Organizational Setup'
            ,'exec_name'=>"Local Executive Full name",'position'=>'Position','department'=>'Department','last_name'=>'Last Name','first_name'=>'First Name','email'=>'Email', 'paid'=>'Payment Option' , 'membr_fee' => 'Membership Fee', 'membr_filename'=>'Proof of payment for membership'
            , 'eboss'=>'E-boss','topics'=>'Session Topics', 'mempaid'=>'Membership Payment Option'
            
        ]);

        
          
     

   
        // $user = User::create([
        
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        $find_info = Participants::select('user_id')->where(
            [
                'last_name' => $request->last_name,
                'first_name' => $request->first_name, 
                 'mid_name'  =>$request->mid_name,
            ]
        )->first();
        if (!empty($find_info)) {
            // return response()->json(['fullname' => "You're already registered."], 422);
            return redirect()->back()->withErrors([
                'fullname' => "You're already registered.",
            ]);
        }
        if ($request) {
           
            
            
            // $gen_ref_no = $request->genRefNum();
            
            $insert_bene = $request->except(['password']);
            $insert_bene['ref_no']=(new Participants)->genRefNum();
            $insert_bene['validation_status']='pending';
            // $insert_bene['reciept_filename']=(new Participants)->uploadAttachment();
            // if(!empty($request['membr_since'])){
            //     $insert_bene['membr_since'] = date('Y-m-d', strtotime($request['membr_since']));
                
            // }
            // else{
            //   unset( $insert_bene['membr_since']);
            // }

            
            
            $user_last = $request['last_name'];
            $user_first = $request['first_name'];
            $user_mid = $request['mid_name'];
            $refno = $insert_bene['ref_no'];
            $userful = $user_last.' , '.$user_first.' '.$user_mid;
            $userfull = $user_last.'_'.$user_first;
            $user_city=$request['addr_municipality'];
            if (!empty($request->file('reciept_filename'))) {
                $insert=$this->uploadAttachment($request->file('reciept_filename'), $user_city,$userfull);
                // $insert=$this->uploadAttachment($request->file('reciept_filename'), $user_city,$userfull,$refno);
                $insert_bene['reciept_filename']=$insert['reciept_filename'];
            }
    
            if (!empty($request->file('membr_filename'))) {
                $insert=$this->uploadAttachments($request->file('membr_filename'), $user_city,$userfull);
            
                $insert_bene['membr_filename']=$insert['membr_filename'];
            }
    

            $all_caps_exceptionn = ['email'];

            array_walk($insert_bene, function(&$arr, $arr_i) use ($all_caps_exceptionn) {
                if (!in_array($arr_i, $all_caps_exceptionn)) {
                    $arr = strtoupper($arr);
                }
            });

            // if (!empty($find_on_verified)) {
            //     $extract_groups = array_column($find_on_verified->toArray(), 'REMARKS');
            //     $concat_group = implode(',', $extract_groups);
                
            //     $insert_bene['bene_group_master'] = strtolower($concat_group);
            // }
          
         

            $user_profile = Participants::create($insert_bene);


        }
       
        event(new Registered($request));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::Succ);
        return inertia('SucessPage', [
         
            'ref_id' =>$refno,
            'fullname'=> $userful
            // 'sent_otp' => true,
            // 'message' => "TEST",
            // 'ref_id' => '112021222',
        ]);
    }


    // public function getBeneFullnameAttribute($value)
    // {
    //     $fullname = '';
        
    //     if (!empty($this->mid_name)) {
    //         $mi = implode('', array_map(function($ar) { return $ar[0]; }, explode(' ', $this->mid_name)));
            
    //         $fullname = "{$this->first_name} {$mi}. {$this->last_name}";
            
    //     } else {
    //         $fullname = "{$this->first_name} {$this->last_name}";

    //     }

    //     if (!empty($this->ext_name) && strcasecmp($this->ext_name, 'none') != 0) {
    //         $fullname .= ', '.$this->ext_name;
    //     }

    //     return trim(ucwords($fullname));

    // }

    /**
     * Uploading of government ID submiited by client
     *
     * @param Request $request_file        Request instance e.g. $request->file("upload_image") 
     * @param Int $user_id                  ID used in bene table.
     * @param String $bene_contact_num           Mobile number used by bene. 
     * @return void
     */

    public function uploadAttachment(Object $request_file,String $user_city,String $userfull)
    {
       
        $folder = 'receipt_files/'.$user_city.'/'.$userfull.'/';

        $full_path = storage_path('app/'.$folder);
        $up_filename = preg_replace('/[^a-zA-Z0-9\-\._ ]/', '-', $request_file->getClientOriginalName()); // sanitize illegal string and replace it wtith dash(-)
       

        // $up_filename = preg_replace('/[^a-zA-Z0-9\-\._ ]/', '-', $request_file->getClientOriginalName().'_'.$refno); // filename with ref number include refno on param first

        if (!file_exists($full_path)) {
            Storage::makeDirectory($folder);

        }

        if (file_exists($full_path.'/'.$up_filename)) {
            $filename_without_ext = Str::beforeLast($up_filename, '.');
            $new_filename = $filename_without_ext.'(1)';
                $testfilename = 'membership';
            $up_filename = $new_filename.' '.$request_file->clientExtension();
         
        }

      

        $uploaded = Storage::putFileAs($folder, $request_file, $up_filename);
        
    
            if ($uploaded) {
            $update_data = [
                'reciept_filename' => $up_filename,
               
            ];
            
            // $return_data = (new Participants)->where('user_id',)->update($update_data);

        }

        return $update_data;
    }
    public function uploadAttachments(Object $request_file,String $user_city,String $userfull)
    {
       
        $folder = 'receipt_files/'.$user_city.'/'.$userfull.'/';

        $full_path = storage_path('app/'.$folder);
       
        $up_membrfilename = preg_replace('/[^a-zA-Z0-9\-\._ ]/', '-', $request_file->getClientOriginalName()); // sanitize illegal string and replace it wtith dash(-)


        // $up_filename = preg_replace('/[^a-zA-Z0-9\-\._ ]/', '-', $request_file->getClientOriginalName().'_'.$refno); // filename with ref number include refno on param first

        if (!file_exists($full_path)) {
            Storage::makeDirectory($folder);

        }



        if (file_exists($full_path.'/'.$up_membrfilename)) {
            $filename_without_ext = Str::beforeLast($up_membrfilename, '.');
            $new_filename = $filename_without_ext.'(1)';
                $testfilename = 'membership';
        
            $up_membrfilename = $testfilename.'.'.$new_filename.'.'.$request_file->clientExtension();
        }


        $uploaded = Storage::putFileAs($folder, $request_file,$up_membrfilename);
        
    
            if ($uploaded) {
            $update_data = [
                
                'membr_filename' => $up_membrfilename,
            ];
            
            // $return_data = (new Participants)->where('user_id',)->update($update_data);

        }

        return $update_data;
    }
    // public function uploadIdPreview()
    // {
    //     $bene_profile = $this->authBeneProfile();
    //     $bene_mobile = $bene_profile->contact_no;
    //     $bene_file = $bene_profile->id_filename;

    //     $bene_folder = storage_path('app/bene_files/'.sha1($bene_mobile).'/'.$bene_file);

    //     return response()->file($bene_folder);
    // }
	
public function checkRequestStatus(Request $req)
    {
        $alert_type = '';
        $alert_message = '';

        $req->validate([
            'ref_no' => ['required', 'alpha_num', 'size:8'],
        ], [], ['ref_no' => 'reference number']);

        $fields = ['user_id', 'last_name', 'first_name', 'mid_name', 'ext_name', 'validation_status','addr_municipality' ,'paid','mempaid'];

        $get_info = Participants::select($fields)->where('ref_no', strtoupper($req->ref_no))->first();
        
        if (empty($get_info)) {
            $alert_type = 'error';
            $alert_message = "Unable to find reference number or it doesn't exists.";
            $info = [];

        } else {
            $info = $get_info->makeHidden(['created_date_formatted']);


        }

        return response()->json([
            'alert' => ['alert_type' => $alert_type, 'alert_message' => $alert_message],
            'info' => $info,
        ]);
        
    }


     public function verificationChangeStatus(Request $req)
    {
      
        $max_filesize = 10000;

      
        $req->validate([
            'user_id' => ['exists:participants'],
            'paid'=>'max:30',
            'mempaid'=>'max:30',
            'reciept_filename'=>['required_if:paid,PAY LATER', 'nullable','max:'.$max_filesize, 'mimes:jpeg,jpg,png'],
            'membr_filename'=>['nullable','max:'.$max_filesize, 'mimes:jpeg,jpg,png'],
        ],[], ['reciept_filename' => 'Attachment']);
      

        
       


     
    
        $user_last = $req['last_name'];
        $user_first = $req['first_name'];
        $userfull = $user_last.'_'.$user_first;
        $user_city=$req['addr_municipality'];
        if (!empty($req->file('reciept_filename'))) {
            $insert=$this->uploadAttachment($req->file('reciept_filename'), $user_city,$userfull);
            // $insert=$this->uploadAttachment($request->file('reciept_filename'), $user_city,$userfull,$refno);
            $update_info['reciept_filename']=$insert['reciept_filename'];
			  $update_info['paid'] = 'PAID';
        }

        if (!empty($req->file('membr_filename'))) {
            $insert=$this->uploadAttachments($req->file('membr_filename'), $user_city,$userfull);
        
            $update_info['membr_filename']=$insert['membr_filename'];
		 $update_info['mempaid'] = 'PAID';
        }
        
        $save_bene = Participants::where(['user_id'=>$req->user_id])->update($update_info);
				
	  return inertia('checkstatus', [
         
         
        ]);
      
    
}
}
