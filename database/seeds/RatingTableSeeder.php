<?php

use Illuminate\Database\Seeder;

class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['1','2','3','4','5','6','7','9','10'];

        foreach($data as $RatingNum) {
            $rating = new \App\Rating();
            $rating->rating = $RatingNum;
            $rating->save();
        }
    }
}
