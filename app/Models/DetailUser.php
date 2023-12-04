<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'birthday',
        'address',
        'phone',
        'nik',
        'gender',
        'domisili',
        'user_id',
        'payment_id',
        'rekening'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }
}
