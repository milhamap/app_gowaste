<?php

namespace App\Models;

use App\Models\BankSampah;
use App\Models\OrderSampah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_loc',
        'user_id',
        'times',
        'bank_sampah_id',
        'order_sampah_id',
    ];

    public function bankSampah()
    {
        return $this->belongsTo(BankSampah::class);
    }

    public function orderSampah()
    {
        return $this->belongsTo(OrderSampah::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
