<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       \DB::table('favorites')->delete();

       $users=User::pluck('id')->all();
       $numofUsers =count($users);

       foreach(Question::all() as $question){
        for($i=0;$i<rand(0,$numofUsers);$i++)
        {
            $user =$users[$i];

            $question->favorites()->attach($user);
        }
       }
    }
}
