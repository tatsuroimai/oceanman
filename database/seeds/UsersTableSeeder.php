<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'Ringo Starr',
            'email' => 'ringostarr@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'ringostarr.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('users')->insert($param);
   
        $param = [
            'name' => 'Norah Jones',
            'email' => 'norahjones@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'norahjones.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => 'Michael Stipe',
            'email' => 'michaelstipe@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'michaelstipe.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => 'Chun Li',
            'email' => 'chunli@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'chunli.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => 'Travie Mccoy',
            'email' => 'traviemccoy@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'traviemccoy.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
    }
}
