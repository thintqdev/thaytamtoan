<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => 1,
            'full_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '123456'
        ];

        User::updateOrCreate(['id' => $data['id']], $data);

        return 0;
    }
}
