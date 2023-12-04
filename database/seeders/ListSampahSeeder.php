<?php

namespace Database\Seeders;

use App\Models\ListSampah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sampahs = [
            [
                'name' => 'Daur Ulang',
                'price' => 100
            ],
            [
                'name' => 'Sandal dan Sepatu',
                'price' => 170
            ],
            [
                'name' => 'Owol',
                'price' => 200
            ],
            [
                'name' => 'Bagor Kecil',
                'price' => 200
            ],
            [
                'name' => 'Bagor Rusak',
                'price' => 200
            ],
            [
                'name' => 'Plastik Putih Sablon',
                'price' => 500
            ],
            [
                'name' => 'Kresek',
                'price' => 400
            ],
            [
                'name' => 'Helm',
                'price' => 400
            ],
            [
                'name' => 'Jas Hujan',
                'price' => 700
            ],
            [
                'name' => 'Plastik Putih',
                'price' => 1200
            ],
            [
                'name' => 'Ember Hitam',
                'price' => 1700
            ],
            [
                'name' => 'Ember Warna',
                'price' => 2000
            ],
            [
                'name' => 'Arsip',
                'price' => 2400
            ],
            [
                'name' => 'Aqua Gelas Kotor',
                'price' => 3000
            ],
            [
                'name' => 'Aqua Gelas Bersih',
                'price' => 4000
            ],
            [
                'name' => 'Ember Putih',
                'price' => 5000
            ]
        ];
        foreach ($sampahs as $sampah) {
            ListSampah::create([
                'name' => $sampah['name'],
                'price' => $sampah['price'],
            ]);
        }
    }
}
