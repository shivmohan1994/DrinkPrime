<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<50; $i++) {
            DB::table('leads')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'contact' => Rand(1111111111,9999999999),
                'address' => str_random(100),
                'area' => str_random(20),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
