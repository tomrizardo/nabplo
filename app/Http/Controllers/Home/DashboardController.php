<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;



use App\Models\User;
use App\Models\Participants;
use App\Models\Municipality;
use App\Models\Attachments;
use App\Models\Articles;
use App\Models\Executive;
use App\Models\Parti;
use App\Models\Advisory;
use App\Models\Directory;



use DB;
class DashboardController extends Controller
{


    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {

        $info = Directory::select('region')->groupBy('region')->get();
     
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return Inertia::render('Auth/Home',[
        
            'info'=>    $info
               
        ]);
    
    }

       /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function participants()
    {
            $info = Municipality::select('region') -> groupBy('region')->get();
   
        // $info = Parti::select('participants.*', 'muncipalities.*')
        // ->join('muncipalities', 'participants.addr_municipality', '=', 'muncipalities.name')
        // ->get();
        return Inertia::render('Auth/Participants',[
        
            'info'=>    $info,
                  
        ]);
    
    }

        /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function settings()
    {
        $alluser = User::where('verification', 0)->get();
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return Inertia::render('Auth/Verification',[
        
            'users'=>    $alluser
               
        ]);
    
    }

            /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function dashboard()
    {
       
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return Inertia::render('Auth/Dashboard',[
        
       
               
        ]);
    
    }


    
    public function getRecordss(Request $req)
    {
   
        
        $paramOne=$req['keyword'];
        $paramTwo = $req['region'];
        $paramThree=$req['province'];
    
        // $info = Parti::with('municipal')->select('*')
           $info = Parti::select('participants.*', 'muncipalities.*')
       ->join('muncipalities', 'participants.addr_municipality', '=', 'muncipalities.name')
            ->where ([   ['addr_municipality', 'LIKE', '%'.$paramOne.'%'],
            ['region', 'LIKE', '%'.$paramTwo.'%'],
            ['province', 'LIKE', '%'.$paramThree.'%']])
            ->orderBy('first_name','ASC')
            ->orWhere ([   ['last_name', 'LIKE', '%'.$paramOne.'%'],
            ['region', 'LIKE', '%'.$paramTwo.'%'],
            ['province', 'LIKE', '%'.$paramThree.'%']])
            ->orderBy('first_name','ASC')
         ->get();

        if (empty($info)) {
            $alert_typep = 'error';
            $alert_message = "Unable to find reference number or it doesn't exists.";
            $ser = [];

        }
        
    else{
        $ser  = $info;
    }
            
                 

        
        return response()->json([

            'info'=>$ser,
         
            
            
           ]); 
        }



    public function getRecords(Request $req)
    {
   
        
        $paramOne=$req['keyword'];
        $paramTwo = $req['region'];
        $paramThree=$req['province'];
    
        $info = Directory::select()
            ->where ([   ['municipality', 'LIKE', '%'.$paramOne.'%'],
            ['region', 'LIKE', '%'.$paramTwo.'%'],
            ['province', 'LIKE', '%'.$paramThree.'%']])
            ->orderBy('bplo_chief','ASC')
            ->orWhere ([   ['bplo_chief', 'LIKE', '%'.$paramOne.'%'],
            ['region', 'LIKE', '%'.$paramTwo.'%'],
            ['province', 'LIKE', '%'.$paramThree.'%']])
            ->orderBy('bplo_chief','ASC')
         ->get();

        if (empty($info)) {
            $alert_typep = 'error';
            $alert_message = "Unable to find reference number or it doesn't exists.";
            $ser = [];

        }
        
        else {
            $ser = $info->map(function ($participant) {
                $participant['bplo_chief'] = utf8_decode($participant['bplo_chief']);
                $participant['email'] = utf8_decode($participant['email']);
            
                    // $participant['municipality'] = utf8_decode($participant['municipality']);
              
            
            
                // $participant['mayor'] = utf8_decode($participant['mayor']);
                // $participant['province'] = utf8_decode($participant['province']);
             
                // $participant['region'] = utf8_decode($participant['region']);
                
                // $participant['office_number'] = utf8_decode($participant['office_number']);
                return $participant;
            });
            // $ser = $info->map(function ($employee) {
            //     $employee['full_name'] = $employee['last_name'] . ', ' . $employee['first_name'] . ' ' . $employee['mid_name'];
            //     return $employee;
            // });

        }
        return response()->json([

            'info'=>$ser,
         
            
            
           ]); 
        }

                /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function RoleChange(Request $req)
    {
      
        $update_info['verification']=$req['verification'];
        

     
        $save_bene = User::where(['id'=>$req->id])->update($update_info);
        $message = 'Roles Change Successfuly';
        return response()->json([
          
            
            'message'=>$message
        ]);
      
      
    }

           /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function articles()
    {
        $art = Articles::select('*')->where('isActive','1')->orderBy('sort','ASC')->get();
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');


        
        foreach ($art as $arts) {
            $filePath = storage_path('app/app/public/articles/' . $arts->picture_filename);
    
            if (file_exists($filePath)) {
                $fileContent = file_get_contents($filePath);
                $arts->signature_data_uri = $fileContent;
            } else {
                $arts->signature_data_uri = null; // or provide a default image URL
            }
        }
        return Inertia::render('Articles',[
        
            'articles'=>    $art
               
        ]);
    
    }
    

    
           /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function advisorys()
    {
        $art = Advisory::select('*')->orderBy('sort','ASC')->get();


        foreach ($art as $execss) {
            $filePath = storage_path('app/app/public/advisory/' . $execss->picture_filename);
    
            if (file_exists($filePath)) {
                $fileContent = file_get_contents($filePath);
                $execss->signature_data_uri = $fileContent;
            } else {
                $execss->signature_data_uri = null; // or provide a default image URL
            }
        }
 
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return response()->json([
          
            
            'advisory'=>$art
        ]);
      
    
    }
    
           /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function exec()
    {
        $exec = Executive::select('*')->orderBy('sort','ASC')->get();

        foreach ($exec as $execss) {
           $filePath = storage_path('app/app/public/profile/' . $execss->picture_filename);
   
           if (file_exists($filePath)) {
               $fileContent = file_get_contents($filePath);
               $execss->signature_data_uri = $fileContent;
           } else {
               $execss->signature_data_uri = null; // or provide a default image URL
           }

           $execss->name = $execss->first_name . ' ' . $execss->mid_name . ' ' . $execss->last_name;
       }
        return Inertia::render('Executive',[
        
            'executives'=>    $exec
               
        ]);
    
    }
    
      
           /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function articless()
    {
        $art = Articles::select('*')->orderBy('sort','ASC')->take(3)->get();


        foreach ($art as $execss) {
            $filePath = storage_path('app/app/public/articles/' . $execss->picture_filename);
    
            if (file_exists($filePath)) {
                $fileContent = file_get_contents($filePath);
                $execss->signature_data_uri = $fileContent;
            } else {
                $execss->signature_data_uri = null; // or provide a default image URL
            }
        }
 
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return response()->json([
          
            
            'articles'=>$art
        ]);
      
    
    }

    public function provinces(Request $req)
    {

          
        $paramOne=$req['province'];

     
        $province = Directory::select('province')
        ->where('region','LIKE','%'.$paramOne.'%'  )
        ->groupBy('province')
        ->get();
        return response()->json([
          
            
            'province'=>$province
        ]);
      
      
    }

    public function pprovince(Request $req)
    {

          
        $paramOne=$req['province'];

     
        $province = Municipality::select('province')
        ->where('region','LIKE','%'.$paramOne.'%'  )
        ->groupBy('province')
        ->get();
        return response()->json([
          
            
            'province'=>$province
        ]);
      
      
    }
    
    
}
