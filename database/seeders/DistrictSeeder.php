<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::insert([
            ['id'=>1,'name' => 'Gazipur', 'division_id' => 1],
            ['id'=>2,'name' => 'Chattogram', 'division_id' => 2],
            ['id'=>3,'name' => 'Comilla', 'division_id' => 2],
            ['id'=>4,'name' => 'Coxs_Bazar', 'division_id' => 2],            
            ['id'=>5,'name' => 'Rajshahi', 'division_id' => 3],
        ]);
       
    }
}
