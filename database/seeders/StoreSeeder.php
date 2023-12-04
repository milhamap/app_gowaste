<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
            [
                'title' => 'KERAJINAN VAS DARI TALI RAMI',
                'prize' => 'Rp. 100.000',
                'image' => 'KERAJINAN VAS DARI TALI RAMI DAN KARDUS.png'
            ],
            [
                'title' => 'LAMPU BOHLAM DARI LIMBAH SENDOK',
                'prize' => 'Rp. 120.000',
                'image' => 'LAMPU BOHLAM DARI LIMBAH SENDOK.png'
            ],
            [
                'title' => 'TAS DARI LIMBAH PLASTIK',
                'prize' => 'Rp. 150.000',
                'image' => 'TAS DARI LIMBAH PLASTIK.png'
            ],
            [
                'title' => 'VAS DARI BOTOL',
                'prize' => 'Rp. 200.000',
                'image' => 'VAS DARI BOTOL.png'
            ],
            [
                'title' => 'KERAJINAN BATOK KELAPA',
                'prize' => 'Rp. 80.000',
                'image' => 'KERAJINAN BATOK KELAPA.png'
            ],
            [
                'title' => 'KERAJINAN DARI LIMBAH KORAN',
                'prize' => 'Rp. 100.000',
                'image' => 'KERAJINAN DARI LIMBAH KORAN.png'
            ]
        ];
        foreach ($stores as $store) {
            Store::create([
                'title' => $store['title'],
                'prize' => $store['prize'],
                'image' => $store['image']
            ]);
        }
    }
}
