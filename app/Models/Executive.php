<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Str;
class Executive extends Model
{
    protected $connection = 'mysql';
    protected $table='executives';
    protected $fillable=[
        'last_name',
        'first_name',
        'mid_name',
                'position',
                'prefix',            
            'sort',
        'picture_filename',



    ];
    use HasFactory;
}
