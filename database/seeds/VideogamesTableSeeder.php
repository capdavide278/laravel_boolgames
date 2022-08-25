<?php


use App\Videogames;

use Faker\Generator as Faker;

use Illuminate\Database\Seeder;

class VideogamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0 ; $i < 5; $i++){
            $Videogame = new Videogames();
            $Videogame->nome = $faker->word();
            $Videogame->descrizione = $faker->sentence(3);
            $Videogame->img = $faker->imageUrl(640, 480, 'animals', true);
            $Videogame->save();
        }
    
    }
}
