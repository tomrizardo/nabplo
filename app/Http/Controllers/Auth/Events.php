<?php

namespace App\Http\Controllers\Auth;

trait Events{

public function appRequest(String $ref_no)

{
$insert_request=[
        'ref_no'=>$ref_no,



];
return $insert_request;
}


}