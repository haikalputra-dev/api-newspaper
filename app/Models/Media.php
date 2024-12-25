<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $primaryKey = 'media_id';

    protected $fillable = [
        'file_name',
        'file_type',
        'file_url',
        'file_size',
        'uploaded_by',
        'created_at',
    ];

    // Relationships
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

}
