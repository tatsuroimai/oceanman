<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([ 'topic' => 'Animal']);
        DB::table('topics')->insert([ 'topic' => 'Scenery']);
        DB::table('topics')->insert([ 'topic' => 'Fashion']);
        DB::table('topics')->insert([ 'topic' => 'Technology']);
        DB::table('topics')->insert([ 'topic' => 'Art']);
    }
}
