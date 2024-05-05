<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //We can change this condition later on according to requirement
        if (Customer::count() < 5) {
            Customer::factory(5)->create();
        }
    }
}
