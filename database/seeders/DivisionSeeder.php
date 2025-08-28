<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Division::insert([
            ['id'=>1,'name' => 'Dhaka'],
            ['id'=>2,'name' => 'Chattogram'],
            ['id'=>3,'name' => 'Rajshahi'],
            ['id'=>4,'name' => 'Khulna'],
            ['id'=>5,'name' => 'Barisal'],
            ['id'=>6,'name' => 'Sylhet'],
            ['id'=>7,'name' => 'Rangpur'],
            ['id'=>8,'name' => 'Mymensingh'],
        ]);

    }
}
