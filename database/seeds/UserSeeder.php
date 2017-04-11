<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users')->insert([
            
            'name' => 'Priyank Bhargava',
            'email' => 'priyankbhargava2008@gmail.com',
            'phone' => '9407183852',
            'password' => bcrypt('shriyank1986'),
            'role_id' => '1',
            'activation_status' => '1',
            'profile_picture' => 'default-profile-pic.jpg',
            'firstname' => 'Priyank',
            'lastname'   => 'Bhargava',
            'company'    => 'Suryawebtech',
            'bank_name' => 'Corp Bank',
            'account_number' => '123456789',
            'branch_code' => 'ABCD',
            'account_holder' => 'Priyank Bhargava',
            'created_at'     => strftime('%Y-%m-%d %H:%M:%S', time())
            
            
        ]);
        
        DB::table('users')->insert([
            
            'name' => 'Surbhi Bhargava',
            'email' => 'surbhi@suryawebtech.com',
            'phone' => '9407183852',
            'password' => bcrypt('shriyank1986'),
            'role_id' => '2',
            'activation_status' => '1',
            'profile_picture' => 'default-profile-pic.jpg',
            'firstname' => 'Surbhi',
            'lastname'   => 'Bhargava',
            'company'    => 'Suryawebtech',
            'bank_name' => 'Corp Bank',
            'account_number' => '123456789',
            'branch_code' => 'ABCD',
            'account_holder' => 'Surbhi Bhargava',
            'plan_id'       => '1',            
            'created_at'     => strftime('%Y-%m-%d %H:%M:%S', time())
            
            
        ]);
        
        DB::table('users')->insert([
            
            'name' => 'Gudiya Bhargava',
            'email' => 'gudiya@suryawebtech.com',
            'phone' => '9407183852',
            'password' => bcrypt('shriyank1986'),
            'role_id' => '2',
            'activation_status' => '1',
            'profile_picture' => 'default-profile-pic.jpg',
            'firstname' => 'Gudiya',
            'lastname'   => 'Bhargava',
            'company'    => 'Suryawebtech',
            'bank_name' => 'Corp Bank',
            'account_number' => '123456789',
            'branch_code' => 'ABCD',
            'account_holder' => 'Gudiya Bhargava',
            'plan_id'       => '2',             
            'created_at'     => strftime('%Y-%m-%d %H:%M:%S', time())
            
            
        ]);
        
        DB::table('users')->insert([
            
            'name' => 'Swati Joshi',
            'email' => 'swati@suryawebtech.com',
            'phone' => '9407183852',
            'password' => bcrypt('shriyank1986'),
            'role_id' => '2',
            'activation_status' => '1',
            'profile_picture' => 'default-profile-pic.jpg',
            'firstname' => 'Swati',
            'lastname'   => 'Joshi',
            'company'    => 'Suryawebtech',
            'bank_name' => 'Corp Bank',
            'account_number' => '123456789',
            'branch_code' => 'ABCD',
            'account_holder' => 'Swati Joshi',
            'plan_id'        => '3',
            'created_at'     => strftime('%Y-%m-%d %H:%M:%S', time())
            
            
        ]);
    }
}
