<?php

namespace Database\Seeders;

use App\Models\BankSampah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            // Surabaya
            [
                'name' => 'Bank Sampah Induk Surabaya'
            ],
            [
                'name' => 'Bank Sampah Unit Jati Asri 1'
            ],
            [
                'name' => 'Bank Sampah Mulyorejo'
            ],
            [
                'name' => 'Bank Sampah Jambangan Pitu'
            ],
            [
                'name' => 'Bank Sampah Mandiri Sejahtera'
            ],
            [
                'name' => 'Bank Sampah Manyar Mandiri'
            ],
            [
                'name' => 'Bank Sampah Kampung Dinoyo'
            ],
            [
                'name' => 'Bank Sampah Melati'
            ],
            [
                'name' => 'Bank Sampah Barokah'
            ],
            [
                'name' => 'Bank Sampah NH'
            ],
            [
                'name' => 'Bank Sampah Bintang Mangrove'
            ],
            // Gresik
            [
                'name' => 'Bank Sampah Kertabumi'
            ],
            [
                'name' => 'Bank Sampah Resik Mandiri'
            ],
            [
                'name' => 'Bank Sampah Ceria'
            ],
            [
                'name' => 'Bank Sampah'
            ],
            [
                'name' => 'Bank Sampah Lancar Jaya'
            ],
            [
                'name' => 'Bank Sampah Kutilang Asri'
            ],
            [
                'name' => 'Bank Sampah Putri Mandiri'
            ],
            [
                'name' => 'Bank Sampah Pucuk Merah'
            ],
            [
                'name' => 'Bank Sampah Gemes - Fitriah'
            ]
        ];
        foreach ($banks as $bank) {
            BankSampah::create($bank);
        }
    }
}
