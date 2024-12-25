<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        System::create([
            'name' => 'Company Example',
            'favicon' => 'favicon.ico',
            'description' => 'This is a description of the company.',
            'address' => '123 Company St, Example City, EX 12345',
        ]);
    }
}
