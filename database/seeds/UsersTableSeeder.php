<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Jill',
      'email' => 'jill@harvard.edu',
      'password' => \Hash::make('helloworld'),
   ]);
      DB::table('users')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Jamal',
      'email' => 'jamal@harvard.edu',
      'password' => \Hash::make('helloworld'),
   ]);
   DB::table('users')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Jon macleod',
      'email' => 'snoyface@yahoo.com',
      'password' => \Hash::make('helloworld'),
   ]);
  }
}
