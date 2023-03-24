<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


use App\Http\Controllers\Settings\Forms as FormSettings;

use App\Models\Participants;


class Dashboard extends Controller
{
    use FormSettings;

    private $assoc_page_name_usr = 'bene_dashboard';

    // public function __construct(AuditLogs $audit_logs_model)
    // {
    //     $this->log_model = $audit_logs_model;
    // }

    // public function Dashboard()
    // {

    //     $usr_info = Participants::select(
    //         'last_name',
    //         'first_name',
    //         'department',
    //         'position',
    //         'addr_municipality',
    //         'mid_name',
    //         'mid_initial',

    //         'validation_status',
    //         'validation_remarks',
    //         'created_at',
    //     )->where('user_id', Auth::user()->id)->first();

    //     $usr_info->created_at = date('M. d, Y', strtotime($usr_info->created_at));
        
    //     // $this->log_model->appLog('access', 'view dashboard', static::class, $this->assoc_page_name_usr);

    //     return Inertia::render('Dashboard', [
    //         'usr_info' => $usr_info->toArray(),
    //     ]);
    // }
}
