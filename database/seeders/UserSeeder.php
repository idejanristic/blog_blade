<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create(attributes: [
            'name' => env(key: 'ADMIN_NAME', default: 'Admin'),
            'email' => env(key: 'ADMIN_EMAIL', default: 'dejan@sma.il'),
            'password' => bcrypt(env(key: 'ADMIN_PASSWORD', default: '12345678'))
        ]);

        User::factory(count: 29)->create();
    }
}
