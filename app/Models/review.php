<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
        'images',
        'is_approved',
        'created_at',
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
