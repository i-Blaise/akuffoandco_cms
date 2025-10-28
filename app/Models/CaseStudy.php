<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $table = 'case_study';

    protected $fillable = [
        'image',
        'slug',
        'title',
        'author_name',
        'summary',
        'body',
        'author',
        'category',
        'published',
    ];
}
