<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'comment',
        'user_id',
        'article_id',
        'created_at',
        'updated_at',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
