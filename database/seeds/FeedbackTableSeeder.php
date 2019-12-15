<?php

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feedback::truncate();
        factory('App\Models\Feedback', 100)->create();
    }
}
