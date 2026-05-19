<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'content',
        'ingredients',
        'cooking_time',
        'published_at',
        'user_id'
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'cooking_time' => 'integer'
            ];
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    //
}
