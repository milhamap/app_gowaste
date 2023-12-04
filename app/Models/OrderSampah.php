<?php

namespace App\Models;

use App\Models\User;
use App\Models\Booking;
use App\Models\ListSampah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderSampah extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'list_sampah_id',
        'quantity',
        'total',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function listSampah()
    {
        return $this->belongsTo(ListSampah::class);
    }
    public function booking () {
        return $this->hasMany(Booking::class);
    }
}
