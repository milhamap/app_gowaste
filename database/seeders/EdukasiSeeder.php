<?php

namespace Database\Seeders;

use App\Models\Edukasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EdukasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educations = [
            [
                'link' => 'https://www.youtube.com/embed/LM9nRUwOSdw',
                'title' => 'Pot dari Sampah Plastik',
                'description' => 'Berikut adalah cara membuat pot tanaman dengan memanfaatkan sampah plastik'
            ],
            [
                'link' => 'https://www.youtube.com/embed/KQWYvpssvyY',
                'title' => 'Kerajinan dari Sampah Plastik',
                'description' => 'Berikut adalah cara membuat kerajinan dengan memanfaatkan sampah plastik'
            ],
            [
                'link' => 'https://www.youtube.com/embed/sG-Xw4Ckt7U',
                'title' => 'Kerajinan dari Kardus',
                'description' => 'Berikut adalah cara membuat kerajinan dengan memanfaatkan kardus'
            ]
        ];

        foreach($educations as $education) {
            Edukasi::create([
                'link' => $education['link'],
                'title' => $education['title'],
                'description' => $education['description']
            ]);
        }
    }
}
