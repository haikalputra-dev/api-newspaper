<?php

// app/Http/Resources/UserResource.php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->user_id,
            'username' => $this->username,
            'email' => $this->email,
            'full_name' => $this->full_name,
            'bio' => $this->bio,
            'profile_image_url' => $this->profile_image_url,
            'role' => $this->role,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

