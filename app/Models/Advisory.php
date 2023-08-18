<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    use HasFactory;


    protected $connection = 'mysql';
    protected $table='advisory_copy';
    protected $fillable=[
          
            'header',
            'sort',
        'picture_filename',



    ];
}
