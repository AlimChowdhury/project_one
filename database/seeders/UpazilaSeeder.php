<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('upazilas')->insert([
            ['id'=>1,'name' => 'Sreepur', 'district_id' => 1],
            ['id'=>2,'name' => 'Kotwali', 'district_id' => 2],
            ['id'=>3,'name' => 'Shatkania', 'district_id' => 2],
            ['id'=>4,'name' => 'Paba', 'district_id' => 3],

        ]);

    }
}
