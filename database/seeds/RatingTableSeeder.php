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
        $data = ['1','2','3','4','5','6','7','8','9','10'];

       /* foreach($data as $RatingNum) {
            $rating = new \App\Rating();
            $rating-> $RatingNum;
            $rating->save();
        }
        */
        
        for ($i = 0; $i <= 9; $i++){
            $ratingNum = $data[$i];
            DB::table('ratings')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'rating' => $ratingNum,
     ]);}
     }
}