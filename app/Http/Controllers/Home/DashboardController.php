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

        $info = Municipality::select('region')->groupBy('region')->get();
     
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

//     public function getRecords(Request $req)
// {
//     $paramOne = $req->input('keyword');

//     // $attachments = Attachments::all()->map(function($attachment) {
//     //     return array_map('trim', (array) $attachment);
//     // });

//     $participants = Participants::select('participants.*', 'muncipalities.region', 'muncipalities.province')
//         ->join('muncipalities', 'participants.addr_municipality', '=', 'muncipalities.name')
//         ->where(function($query) use ($paramOne) {
//             $query->where('last_name', 'LIKE', '%' . $paramOne . '%')
//                   ->orWhere('first_name', 'LIKE', '%' . $paramOne . '%')
//                   ->orWhere('addr_municipality', 'LIKE', '%' . $paramOne . '%')
//                   ->orWhere('muncipalities.region', 'LIKE', '%' . $paramOne . '%')
//                   ->orWhere('muncipalities.province', 'LIKE', '%' . $paramOne . '%');
//         })
//         ->orderBy('last_name', 'ASC')
//         ->get();

//     if ($participants->isEmpty()) {
//         $alert_type = 'error';
//         $alert_message = "Unable to find reference number or it doesn't exist.";
//         $ser = [];
//     } else {
//         $ser = $participants->map(function ($participant) {
//             $participant['full_name'] = $participant['last_name'] . ', ' . $participant['first_name'] . ' ' . $participant['mid_name'];
//             return $participant;
//         });
//     }

//     return response()->json([
//         'info' => $ser,
//         'test' => $attachments
//     ]);
// }

    public function getRecords(Request $req)
    {
   
        
        $paramOne=$req['keyword'];
        $paramTwo=$req['region'];
        $paramThree=$req['province'];
        // $info = Participants::select('participants.*', 'muncipalities.region','muncipalities.province')
        // ->join('muncipalities', 'participants.addr_municipality', '=', 'muncipalities.name')
        // ->where('last_name','LIKE','%'.$paramOne.'%'  )
        //  ->orWhere('first_name', 'LIKE','%'.$paramOne.'%'  )
        //  ->orWhere('addr_municipality', 'LIKE','%'.$paramOne.'%'  )
        //  ->orWhere('muncipalities.region', 'LIKE','%'.$paramOne.'%'  )
        //  ->orWhere('muncipalities.province', 'LIKE','%'.$paramOne.'%'  )
        //  ->orderBy('last_name','ASC')
        // ->get();

        $info = Participants::select()
            ->where ([   ['municipality', 'LIKE', '%'.$paramOne.'%'],
            ['region', 'LIKE', '%'.$paramTwo.'%'],
            ['province', 'LIKE', '%'.$paramThree.'%']])
            ->orWhere ([   ['bplo_chief', 'LIKE', '%'.$paramOne.'%'],
            ['region', 'LIKE', '%'.$paramTwo.'%'],
            ['province', 'LIKE', '%'.$paramThree.'%']])
          
         ->get();

        if (empty($info)) {
            $alert_typep = 'error';
            $alert_message = "Unable to find reference number or it doesn't exists.";
            $ser = [];

        }
        
        else {
            $ser = $info->map(function ($participant) {
                $participant['bplo_chief'] = utf8_decode($participant['bplo_chief']);
                $participant['municipality'] = utf8_decode($participant['municipality']);
                $participant['mayor'] = utf8_decode($participant['mayor']);
                $participant['province'] = utf8_decode($participant['province']);
                $participant['email'] = utf8_decode($participant['email']);
                $participant['office_number'] = utf8_decode($participant['office_number']);
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

    public function provinces(Request $req)
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
