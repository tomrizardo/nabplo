<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipality;
use DB;
use Str;
class Parti extends Model
{    protected $connection = 'mysql';
    protected $table = 'participants';
    use HasFactory;

  
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
    public function municipal()
    {
        return $this->hasMany(Municipality::class, 'name', 'addr_municipality');
    }

    
}
