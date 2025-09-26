<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(ProductSeeder::class);

        Customer::create([
            'nama' => 'Samuel',
            'email' => 'samuelnanlohy08@gmail.com',
            'password' => Hash::make('admin123'),
            'alamat' => 'London',
            'telp_hp' => '089654614557',
        ]);
        Customer::create([
            'nama' => 'Bridge',
            'email' => 'test@test.com',
            'password' => Hash::make('admin'),
            'alamat' => 'London',
            'telp_hp' => '089654614557',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
