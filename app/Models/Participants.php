<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use DB;
use Str;
class Participants extends Model
{    protected $connection = 'mysql';
    protected $table = 'registrants_copy';
    use HasFactory;

    protected $fillable = [
        'ref_no',
        'last_name',
        'first_name',
        'mid_name',
        'membr_filename',
        'ext_name',
        'reciept_filename',
        'membr_since',
        'validation_status',
        'validation_remarks',
        'uploaded_datetime',
        'contact_no',
        'email',
        'addr_region',
        'addr_province',
        'addr_municipality',
        'lgu_class',
        'payment_type',
        // 'addr_type',
        'exec_name',
        'others_department',
        'position',
        'department',
        'membr_type',
        'nat_employment',
        // 'org_setup',
        // 'bplo_func',
        'full_addr',
        'reg_type',
        'paid',
		// 'eboss',
		// 'topics',
	


    ];
    protected $appends = [
       
        'created_date_formatted',
    ];
    public function getCreatedDateFormattedAttribute($value)
    {
        return date('M. d, Y', strtotime($this->created_at));
    }

    public function genRefNum()
    {
        $ref_no = strtoupper(Str::random(8));

        return ($this->where('ref_no', $ref_no)->exists() ? $this->genRefNum() : $ref_no); 

    }

    
}
