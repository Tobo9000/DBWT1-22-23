<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BenutzerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('benutzer')->insert([
            'name' => 'admin',
            'email' => 'admin@emensa.example',
            'password' => Hash::make('admin'),
            'admin' => true,
            'anzahlfehler' => 0,
            'anzahlanmeldungen' => 0,
            'letzteanmeldung' => null,
            'letzterfehler' => null,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
