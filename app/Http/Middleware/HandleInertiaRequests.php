<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;

use App\Models\Settings\BeneGroup as Pages;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {

        $shared_data = [
            'app' => [
                'name' => config('app.name'),
            ],
            'base_url' => url('/').'/',
            'alert' => [
                'type' => $request->session()->get('prompt_type'),
                'message' => $request->session()->get('prompt_msg'),
                'data' => $request->session()->get('prompt_data'),
            ]
        ];

        if (Auth::check()) {
            $bene_profile = Auth::user()->profile;
            
            $shared_data['auth'] = [
                'user' => $request->user()->only('mobile', 'email'),
            ];

            if (Auth::guard('staff')->check()) {
                
                $shared_data['staff'] = [
                    'fullname' => ucwords(strtolower(Auth::user()->fullname)),
                ];

                $shared_data['allowed_pages'] = Pages::orderBy('sorting', 'asc')->get();

            } else {
                $shared_data['bene_profile'] = [
                    'fullname' => ucwords(strtolower($bene_profile->first_name.' '.$bene_profile->last_name)), 
                ];


            }

            
        } else {
            $shared_data['auth'] = [
                'user' => $request->user(),
            ];
        }


        return array_merge(parent::share($request), $shared_data);
    }
}
