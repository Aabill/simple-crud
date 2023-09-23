<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Store;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      User::factory()->has(Store::factory()->count(50))->create([
        'first_name' => 'John',
				'last_name'	=> 'George',
        'email' => 'g.john@simplecrud.com',
				'password' => Hash::make('T3sting123')
      ]);

    }
}
