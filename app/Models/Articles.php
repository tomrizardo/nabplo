<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Str;
class Articles extends Model
{    protected $connection = 'mysql';
    protected $table = 'articles';
    use HasFactory;

     protected $fillable = [
        'url',
        'sort',
        'isActive',
        'desc',            
    'title',
'picture_filename',
   ];
    protected $appends = [
       
        'created_date_formatted',
    ];
    public function getCreatedDateFormattedAttribute($value)
    {
        return date('M. d, Y', strtotime($this->created_at));
    }

   

    
}
