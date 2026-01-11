<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class participant extends Model
{
    protected $table = 'participants';
    protected $fillable = [
        'tournament_id',
        'user_id',
        'name',
        'car_name',
        'seed_no',
        'is_checked_in'
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
