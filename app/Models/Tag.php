<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $primaryKey = 'tag_id';

    protected $fillable = [
        'name',
        'created_at',
    ];

    // Relationships
    public function articles()
    {
        return $this->hasMany(Article::class, 'tag_id');
    }
}
