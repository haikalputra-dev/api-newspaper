<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $primaryKey = 'article_id';
    protected $fillable = [
        'title', 'content', 'featured_image_url', 'status',
        'view_count', 'published_at', 'author_id', 'tag_id', 'category_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }
}

