<?php

use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * $table->increments('donation_id');
            $table->integer('payer_id');
            $table->integer('receiver_id');
            $table->integer('amount_paid');
            $table->integer('amount_received');
            $table->dateTime('payment_date');
            $table->timestamps();
         */
        
        DB::table('donations')->insert([
            'payer_id' => '2',
            'receiver_id' => '1',
            'amount_paid' => '1000',
            'pop_picture' => 'default-profile-pic.jpg',
            'payment_date' => strftime('%Y-%m-%d %H:%M:%S', time())
        ]);
        
        DB::table('donations')->insert([
            'payer_id' => '3',
            'receiver_id' => '1',
            'amount_paid' => '2000',
            'pop_picture' => 'default-profile-pic.jpg',
            'payment_date' => strftime('%Y-%m-%d %H:%M:%S', time())
        ]);
        
        DB::table('donations')->insert([
            'payer_id' => '4',
            'receiver_id' => '1',
            'amount_paid' => '3000',
            'pop_picture' => 'default-profile-pic.jpg',
            'payment_date' => strftime('%Y-%m-%d %H:%M:%S', time())
        ]);
        
        
    }
}
