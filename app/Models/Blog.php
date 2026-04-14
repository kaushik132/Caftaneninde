<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'author',
        'publish_date',
        'read_time',
        'content',
        'thumbnail',
        'is_published'
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }
}
