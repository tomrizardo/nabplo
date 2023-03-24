<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BeneTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function benePostingTest()
    {
        $sample_input = [
            'mobile' => '09495980565',
            'email' => 'google@yahoo.com',
            'password' => 'asdqwe123',

            'last_name' => 'bato',
            'first_name' => 'jhong',
            'mid_name' => 'payb gee',
            'ext_name' => 'nullable|max:10|regex:'.$regx_alpha,
            'gender' => 'required|in:MALE,FEMALE',
            'bdate' => 'required|date',
            'civil_status' => 'required|exists:settings_civil_status,label',
        ];

        $response = $this->post('/registration', $sample_input);

        dd($response);

        $response->assertStatus(200);
    }
}
