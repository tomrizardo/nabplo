<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;

use App\Models\Settings\Pages;

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
            if (Auth::guard('staff')->check()) {
                $shared_data['staff'] = [
                    'staff_info' =>  $request->user()->only('email', 'last_name', 'first_name', 'roles'), 
                ];
            } else {
                $shared_data['auth'] = [
                    'user' => $request->user()->only('email', 'last_name', 'first_name', 'roles', 'verification'),
                ];
            }
        } else {
            $shared_data['auth'] = [
                'user' => null,
            ];
        }
    
        $shared_data['route'] = [
            'name' => $request->route()->getName(),
        ];
    
        return array_merge(parent::share($request), $shared_data);
    }
    
}
