<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class StaffAuth extends Authenticatable
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'staff_accounts';

    protected $guard = 'staff';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'password', 'first_name', 'mid_name', 'last_name', 'roles', 'email',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullnameAttribute()
    {
        $mi = !empty($this->mi) ? $this->mi.'.' : '';
        
        return ucwords("{$this->lastname}, {$this->firstname} {$mi}");
    }

    
}
