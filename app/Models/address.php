<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'user_id',
        'recipient_name',
        'phone',
        'address_line',
        'ward',
        'district',
        'city',
        'is_default'
    ];
    public $timestamps = false;

    protected $hidden= [
        'is_default'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
