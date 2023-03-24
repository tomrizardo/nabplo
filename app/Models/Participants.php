<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Str;
class Participants extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_no',
        'last_name',
        'first_name',
        'mid_name',
        'membr_filename',
        'ext_name',
		'membr_fee',
        'reciept_filename',
        'membr_since',
        'validation_status',
        'validation_remarks',
        'uploaded_datetime',
        'contact_no',
        'contact_no_date_active',
        'email',
        'addr_municipality',
        'lgu_class',
        'addr_type',
        'exec_name',
        'others_org',
        'position',
        'department',
        'membr_type',
        'nat_employment',
        'org_setup',
        'bplo_func',
        'full_addr',
        'paid',
		'eboss',
		'topics',
		'mempaid',


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
