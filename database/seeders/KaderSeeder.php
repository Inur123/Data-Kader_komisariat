<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kaders')->insert([
            'nama' => 'zainur',
            'jeniskelamin' => 'lakilaki',
            'notelpone' => '2121212',
            'alamat' => 'magetan',
            'jenjangperkaderan' => 'lk1',
            'fakultas' => 'teknik',
            'prodi' => 'Teknik sipil',
        ]);
    }
}
