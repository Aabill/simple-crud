<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
			// get john
			$john = User::where('email','g.john@simplecrud.com')->first();
			if (is_null($john)) {
				// if no john, create with 50 stores
				User::factory()->has(Store::factory()->count(50))->create([
					'first_name' => 'John',
					'last_name'	=> 'George',
					'email' => 'g.john@simplecrud.com',
					'password' => Hash::make('T3sting123')
				]);
			} else {
				// if john exists, add 50 more stores
				Store::factory()->count(50)->create([
					'user_id' => $john->id
				]);
			}
      

    }
}
