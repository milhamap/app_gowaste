<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "username" => "admin",
                "email" => "admin@gmail.com",
                "role_id" => 1
            ],
            [
                "username" => "UMKMSurabaya",
                "email" => "umkmsrby@gmail.com",
                "role_id" => 2
            ],
            [
                "username" => "milhamap",
                "email" => "ilhamap45@gmail.com",
                "role_id" => 3
            ]
        ];

        foreach ($users as $user) {
            $usr = User::create([
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => Hash::make($user['username']),
                'role_id' => $user['role_id']
            ]);
            if($user['role_id'] == 3) {
                DetailUser::create([
                    'user_id' => $usr->id,
                    'fullname' => "Muhammad Ilham Adi Pratama",
                    'nik' => '1234567890123456',
                    'gender' => 'Laki-Laki',
                    'domisili' => 'Surabaya',
                    'birthday' => '2003-08-27',
                    'address' => 'Mlati Kidul',
                    'phone' => '081282615415',
                    'payment_id' => 1,
                    'rekening' => '12345678901234'
                ]);
            }
        }
    }
}
