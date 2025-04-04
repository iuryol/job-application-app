<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class RecruiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recruiters')->insert([
            'id' => 1,
            'name' => 'Jonh Doe',
            'email' => 'jonhdoe@admin.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
