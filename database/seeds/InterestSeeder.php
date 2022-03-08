<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use App\Interest;
use App\User;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interests')->insert([
            'name' => 'Leggere',
        ]);
        DB::table('interests')->insert([
            'name' => 'Dipingere',
        ]);
        DB::table('interests')->insert([
            'name' => 'Visitare musei',
        ]);
        DB::table('interests')->insert([
            'name' => 'Ascoltare musica',
        ]);
        DB::table('interests')->insert([
            'name' => 'Guardare film',
        ]); 
        DB::table('interests')->insert([
            'name' => 'Sport',
        ]);
        DB::table('interests')->insert([
            'name' => 'Fotografia',
        ]);
        DB::table('interests')->insert([
            'name' => 'Cucina',
        ]);
        DB::table('interests')->insert([
            'name' => 'Scrittura',
        ]);
        DB::table('interests')->insert([
            'name' => 'Viaggiare',
        ]);
        
        
        
        

    }
    public function randInterest($interest){
            $users = User::inRandomOrder() -> limit(5) -> get();
            $interest -> posts() -> attach($users);
            $interest -> save();

    }
}
