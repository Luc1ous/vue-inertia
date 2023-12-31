<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'slug', 'text_color', 'bg_color'
    ];
    // protected $with = ['articles'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articles(){
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
