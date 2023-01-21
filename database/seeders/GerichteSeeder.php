<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GerichteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gericht')->where('id', 1)->update([
            'bildname' => '01_bratkartoffel.jpg',
        ]);
        DB::table('gericht')->where('id', 3)->update([
            'bildname' => '03_bratkartoffel.jpg',
        ]);
        DB::table('gericht')->where('id', 4)->update([
            'bildname' => '04_tofu.jpg',
        ]);
        DB::table('gericht')->where('id', 6)->update([
            'bildname' => '06_lasagne.jpg',
        ]);
        DB::table('gericht')->where('id', 9)->update([
            'bildname' => '09_suppe.jpg',
        ]);
        DB::table('gericht')->where('id', 10)->update([
            'bildname' => '10_forelle.jpg',
        ]);
        DB::table('gericht')->where('id', 12)->update([
            'bildname' => '12_kassler.jpg',
        ]);
        DB::table('gericht')->where('id', 13)->update([
            'bildname' => '13_reibekuchen.jpg',
        ]);
        DB::table('gericht')->where('id', 15)->update([
            'bildname' => '15_pilze.jpg',
        ]);
        DB::table('gericht')->where('id', 17)->update([
            'bildname' => '17_broetchen.jpg',
        ]);
        DB::table('gericht')->where('id', 19)->update([
            'bildname' => '19_mousse.jpg',
        ]);
        DB::table('gericht')->where('id', 20)->update([
            'bildname' => '20_suppe.jpg',
        ]);
    }
}
