<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'code',
        'user_id',
        'discount_id',
        'shipping_name',
        'shipping_phone',
        'shipping_address',
        'subtotal',
        'discount_amount',
        'shipping_fee',
        'note',
        'total_amount',
        'status',
        'created_at',
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
