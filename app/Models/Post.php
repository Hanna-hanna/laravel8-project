<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
