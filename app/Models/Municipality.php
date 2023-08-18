<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'muncipalities';

    protected $timestamp = false;

    // protected $fillable = [
    //     'name',
      
        
    // ];

    
}
