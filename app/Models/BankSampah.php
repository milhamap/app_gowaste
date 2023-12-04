<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankSampah extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
