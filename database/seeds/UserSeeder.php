<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Interest;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1000)-> create() -> each(function($user){
            $interests = Interest::inRandomOrder()
                ->limit(4)
                ->get();
            $user -> interests() ->attach($interests);
            $user -> save();
        });
        
    }
}
