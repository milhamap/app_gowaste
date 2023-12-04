<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => 'Potongan 55% Belajar di Ruang Guru',
                'image' => 'RUANGGURU%20REV.png'
            ],
            [
                'title' => 'Potongan 55% Belajar di Quipper',
                'image' => 'QUIPPER%20REV.png'
            ],
            [
                'title' => 'Potongan 55% Belajar di Zenius',
                'image' => 'ZENIUS%20REV.png'
            ]
        ];
        foreach ($events as $event) {
            Event::create([
                'title' => $event['title'],
                'image' => $event['image']
            ]);
        }
    }
}
