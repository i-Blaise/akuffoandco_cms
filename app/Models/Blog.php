<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'main_image',
        'title',
        'author_name',
        'summary',
        'body',
        'category',
        'slug',
        'author',
    ];
}
