<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;




use App\Models\Participants;



use DB;
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');

    }
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $recent_app =DB::table('vw_lgucount')->count();
        // $testarray=DB::table('participants')
        // ->select('muncipalities.region', 'muncipalities.province', 'participants.addr_municipality', DB::raw("'count'(addr_municipality) as count_per_lgu"))
        // ->leftJoin('muncipalities','participants.addr_municipality','=','muncipalities.name')
        // ->groupBy('muncipalities.region','muncipalities.province','participants.addr_municipality')
        // ->orderBy('muncipalities.region','asc')
        // ->orderBy('participants.addr_municipality','asc')
        // ->count();
        $recent_app_listing =DB::table('participants')->count();
        $paid = DB::table('participants')->where('paid','PAID')->count();
        $mempaid = DB::table('participants')->where('mempaid','PAID')->count();
        $yes = DB::table('participants')->where('org_setup','YES')->count();
        $no = DB::table('participants')->where('org_setup','NO')->count();
        $adopt =  DB::table('participants')->where('eboss','like','%'.'Adopt'.'%')->count();
          $status = DB::table('participants')->where('validation_status','PENDING')->count();
          $business =  DB::table('participants')->where('bplo_func','like','%'.'BUSINESS'.'%')->count();
          $others =  DB::table('participants')->where('bplo_func','like','%'.'OTHERS'.'%')->count();
          $treasurers =  DB::table('participants')->where('bplo_func','like','%'.'CITY'.'%')->count();
          $ecolocation =  DB::table('participants')->where('eboss','like','%'.'COLOCATION'.'%')->count();
          $eclearance =  DB::table('participants')->where('eboss','like','%'.'CLEARANCE')->count();
          $efsic =  DB::table('participants')->where('eboss','like','%'.'INTEGRATION OF FSIC'.'%')->count();
          $onestop =  DB::table('participants')->where('topics','like','%'.'SHOP')->count();
          $tclearance =  DB::table('participants')->where('topics','like','%'.'CLEARANCE')->count();
          $tfacility =  DB::table('participants')->where('topics','like','%'.'FACILITY')->count();
          $tfees =  DB::table('participants')->where('topics','like','%'.'FEES')->count();
          $treceipt =  DB::table('participants')->where('topics','like','%'.'RECEIPT')->count();
          $reporst = DB::table('vw_lgucount')->orderBy('region')->get();
        // $recent_app_listing = Municipality::select('name')->get()->pluck('name');
        return Inertia::render('Reports',[
            'report'=>$reporst,
            'perlgu'=>$recent_app,
           'total'=>$recent_app_listing,
            'yes' =>$yes,
            'no' =>$no,
            'paid'=>$paid,
            'mempaid'=>$mempaid,
            'status'=>$status,
            'adopt'=>$adopt, 
            'ecoloc'=>$ecolocation,
            'eclear'=>$eclearance,
            'efsic'=>$efsic,
            'business'=>$business,
            'treasurers'=>$treasurers,  
            'others'=>$others, 
            'onestop'=>$onestop,
            'tclearance'=>$tclearance,
            'tfacility'=>$tfacility,
            'tfees' =>$tfees,
            'treceipt'=>$treceipt,
            
               
        ]);
    
    }
    
}
