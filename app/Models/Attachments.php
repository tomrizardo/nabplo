<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    use HasFactory;

    protected $table = 'directory';

    /**
     * Get the model's attributes as an associative array.
     *
     * @return array
     */
    // public function getAttributes()
    // { 
    //     $attributes = parent::getAttributes();

    //     foreach ($attributes as $key => $value) {
    //         $attributes[$key] = is_string($value) ? trim($value) : $value;
    //     }
    
    //     return $attributes;
    // }
}
