<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            [
                'name' => 'Bank Mandiri',
            ],
            [
                'name' => 'Bank BRI',
            ],
            [
                'name' => 'Bank BCA',
            ],
            [
                'name' => 'Bank BNI',
            ]
        ];
        foreach ($banks as $bank) {
            Payment::create([
                'name' => $bank['name'],
            ]);
        }
    }
}
