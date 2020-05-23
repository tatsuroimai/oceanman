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
            'email' => 'user1@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'user1.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('users')->insert($param);
   
        $param = [
            'name' => 'Mariah Carey',
            'email' => 'user2@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'user2.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => 'Michael Stipe',
            'email' => 'user3@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'user3.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => 'Cyndi Lauper',
            'email' => 'user4@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'user4.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => 'Lionel Richie',
            'email' => 'user5@email.com',
            'password' => bcrypt('test1234'),
            'thumbnail' => 'user5.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
    }
}
