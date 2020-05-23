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
            'title' => '犬',
            'message' => '犬飼いたいな',
            'image' => 'animal1.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);
   
        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '仕事中です',
            'message' => '手が腱鞘炎になる',
            'image' => 'tech1.jpg',
            'topic' => 'technology',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '猫飼いたい',
            'message' => 'ニューヨークで見た絵です',
            'image' => 'art1.jpg',
            'topic' => 'art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ブレードランナーっぽい',
            'message' => 'けどすごいキレイ、行きたい',
            'image' => 'scenery1.jpg',
            'topic' => 'scenery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '感動した',
            'message' => 'すごいきれいだった',
            'image' => 'art3.jpg',
            'topic' => 'art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ブレードランナーっぽい',
            'message' => '良い',
            'image' => 'tech2.jpg',
            'topic' => 'technology',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '撮影完了！',
            'message' => '最高のロケーションでした',
            'image' => 'fashion1.jpg',
            'topic' => 'fashion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '猫が通った',
            'message' => 'どこにでもいるね',
            'image' => 'scenery2.jpg',
            'topic' => 'scenery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '猫かわいい',
            'message' => '足に乗ってきた',
            'image' => 'animal2.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'VRを体験！',
            'message' => 'バイオハザード怖すぎた',
            'image' => 'tech3.jpg',
            'topic' => 'technology',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '奇妙な雰囲気の猫',
            'message' => '奇妙な感じ',
            'image' => 'art2.jpg',
            'topic' => 'art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ドローンで遊んだ',
            'message' => '良い景色を撮影できた！',
            'image' => 'tech4.jpg',
            'topic' => 'technology',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '鳥がいた！',
            'message' => 'ジャングルで発見した',
            'image' => 'animal3.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '信じられない景色！',
            'message' => '感動した',
            'image' => 'scenery3.jpg',
            'topic' => 'scenery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '新しいブランド！',
            'message' => 'みんなよろしく！',
            'image' => 'fashion4.jpg',
            'topic' => 'fashion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ドローンで撮った',
            'message' => '光線がすごいでしょ！',
            'image' => 'scenery4.jpg',
            'topic' => 'scenery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'どういう意味',
            'message' => 'なぜ囲まれてるの',
            'image' => 'art4.jpg',
            'topic' => 'art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '魚きれい',
            'message' => '初めて見たこんなキレイな魚',
            'image' => 'animal4.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ブレードランナーっぽい？',
            'message' => 'カニエ・ウェストかな',
            'image' => 'fashion3.jpg',
            'topic' => 'fashion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ペンギン！',
            'message' => '神々しいところ',
            'image' => 'animal5.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '良い感じ',
            'message' => '良い天気だった',
            'image' => 'fashion2.jpg',
            'topic' => 'fashion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);
    }
}
