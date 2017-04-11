<?php

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        DB::table('plans')->insert([
            'plan_name'  => 'Silver',
            'plan_amount' => '1000',
            
        ]);
        
        DB::table('plans')->insert([
            'plan_name'  => 'Gold',
            'plan_amount' => '2000',
            
        ]);
        
        DB::table('plans')->insert([
            'plan_name'  => 'Platinium',
            'plan_amount' => '3000',
            
        ]);
    }
}
