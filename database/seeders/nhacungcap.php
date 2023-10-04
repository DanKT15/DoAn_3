<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class nhacungcap extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhacungcap')->insert([
            'TENNCC' => Str::random(20),
            'SDT' => Str::random(12),
            'DC' => Str::random(20)
        ]);
    }
}
