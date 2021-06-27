<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ["name", "descriptin", "price", "image", "category_id"];

    protected $hidden = ['pivot'];
    function getAdmin()
    {
       $this->belongsTo(Category::class);
    }


    public function users(){
        return $this->belongsToMany(User::class, 'user_product');
    }


}
