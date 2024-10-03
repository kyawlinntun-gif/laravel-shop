<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
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
                'name' => 'Sophia Brown',
                'email' => 'sophia.brown@example.com',
                'password' => bcrypt('aA1256@d'),
                'is_admin' => false,
                'api_token' => Str::random(60),
                'address' => '123 Maple Street, Springfield, IL',
                'phone_number' => '09796937456'
            ],
            [
                'name' => 'James Johnson',
                'email' => 'james.johnson@example.com',
                'password' => bcrypt('aA1256@d'),
                'is_admin' => false,
                'api_token' => Str::random(60),
                'address' => '456 Oak Avenue, Nashville, TN',
                'phone_number' => '09796937456'
            ],
            [
                'name' => 'Olivia Davis',
                'email' => 'olivia.davis@example.com',
                'password' => bcrypt('aA1256@d'),
                'is_admin' => false,
                'api_token' => Str::random(60),
                'address' => '789 Pine Road, Seattle, WA',
                'phone_number' => '09796937456'
            ],
            [
                'name' => 'Liam Wilson',
                'email' => 'liam.wilson@example.com',
                'password' => bcrypt('aA1256@d'),
                'is_admin' => false,
                'api_token' => Str::random(60),
                'address' => '321 Birch Lane, Austin, TX',
                'phone_number' => '09796937456'
            ],
            [
                'name' => 'Ava Martinez',
                'email' => 'ava.martinez@example.com',
                'password' => bcrypt('aA1256@d'),
                'is_admin' => false,
                'api_token' => Str::random(60),
                'address' => '654 Cedar Street, Miami, FL',
                'phone_number' => '09796937456'
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
