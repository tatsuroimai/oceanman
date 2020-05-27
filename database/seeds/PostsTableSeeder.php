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
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/animal1.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);
   
        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '仕事中です',
            'message' => '毎日充実！',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/tech1.jpg',
            'topic' => 'technology',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '猫飼いたい',
            'message' => 'ニューヨークで見た絵です',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/art1.jpg',
            'topic' => 'art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ブレードランナーっぽい',
            'message' => 'けどすごいキレイ、行きたい',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/scenery1.jpg',
            'topic' => 'scenery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '感動した',
            'message' => 'すごいきれいだった',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/art3.jpg',
            'topic' => 'art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ブレードランナーっぽい',
            'message' => '良い',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/tech2.jpg',
            'topic' => 'technology',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '撮影完了！',
            'message' => '最高のロケーションでした',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/fashion1.jpg',
            'topic' => 'fashion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '猫が通った',
            'message' => 'どこにでもいるね',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/scenery2.jpg',
            'topic' => 'scenery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '猫かわいい',
            'message' => '足に乗ってきた',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/animal2.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'VRを体験！',
            'message' => 'バイオハザード怖すぎた',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/tech3.jpg',
            'topic' => 'technology',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '奇妙な雰囲気の猫',
            'message' => '奇妙な感じ',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/art2.jpg',
            'topic' => 'art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ドローンで遊んだ',
            'message' => '良い景色を撮影できた！',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/tech4.jpg',
            'topic' => 'technology',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '鳥がいた！',
            'message' => 'ジャングルで発見した',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/animal3.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '信じられない景色！',
            'message' => '感動した',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/scenery3.jpg',
            'topic' => 'scenery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '新しいブランド！',
            'message' => 'みんなよろしく！',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/fashion4.jpg',
            'topic' => 'fashion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ドローンで撮った',
            'message' => '光線がすごいでしょ！',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/scenery4.jpg',
            'topic' => 'scenery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'どういう意味',
            'message' => 'なぜ囲まれてるの',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/art4.jpg',
            'topic' => 'art',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '魚きれい',
            'message' => '初めて見たこんなキレイな魚',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/animal4.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ブレードランナーっぽい？',
            'message' => 'カニエ・ウェストかな',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/fashion3.jpg',
            'topic' => 'fashion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => 'ペンギン！',
            'message' => '神々しいところ',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/animal5.jpg',
            'topic' => 'animal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);

        $param = [
            'user_id' => User::all()->random()->id,
            'title' => '良い感じ',
            'message' => '良い天気だった',
            'image' => 'https://oceanmanimages.s3-ap-northeast-1.amazonaws.com/postimages/fashion2.jpg',
            'topic' => 'fashion',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];  
        DB::table('posts')->insert($param);
    }
}
