<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\News;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;
    

    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    public function news () {
        return $this->hasMany(News::class, 'admin_id');
    }


}
