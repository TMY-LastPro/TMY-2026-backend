<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail_url',
        'author_id', // that is user id
        'gallery',
        'is_published',
        'created_at',
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
