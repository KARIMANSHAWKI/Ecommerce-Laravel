<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_ar',
        'title_en',
        'image',
        'description',
        'admin_id'
    ];

    
    function getAdmin()
    {
       $this->belongsTo(Admin::class);
    }
}
