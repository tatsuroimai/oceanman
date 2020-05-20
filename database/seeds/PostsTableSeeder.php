<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ロイかっこいい',
            'message' => 'ブレードランナーは傑作',
            'image' => 'roy.jpeg',
            'topic' => '映画',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);
   
        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ムーミン良いよね',
            'message' => '癒されるわ',
            'image' => 'mumin.jpg',
            'topic' => '本',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);
    }
}
