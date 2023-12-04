<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\StoreSeeder;
use Database\Seeders\EdukasiSeeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\BankSampahSeeder;
use Database\Seeders\ListSampahSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EdukasiSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(ListSampahSeeder::class);
        $this->call(BankSampahSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
