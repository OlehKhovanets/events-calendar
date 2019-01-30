<?php

use Illuminate\Database\Seeder;

class EventManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calendar_events')->insert([
            'title' => str_random(10),
            'start' => date('Y-m-d'),
            'end' => date('Y-m-d'),
            'user_id' => 1,
            'is_all_day' => 1,
            'background_color' => 'yellow',
            'file_path' => '/rundom/path'
        ]);
    }
}
