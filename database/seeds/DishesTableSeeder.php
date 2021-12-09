<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Dish;
use App\User;

use Faker\Generator as Faker;


class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();

        for ($i = 0; $i < 27; $i++){
            $newDish = new Dish();
            $newDish->user_id = Arr::random($user_ids);
            $newDish->name = $faker->sentence(4);
            $newDish->description = $faker->text();
            $newDish->available = $faker->numberBetween(0, 1);
            $newDish->price = $faker->numberBetween(0, 1000);
            $newDish->weigth = $faker->numberBetween(2, 100);
            $newDish->image = 'https://via.placeholder.com/900x150.png?text=Ragazzi+Ciao';

            $newDish->save();
        }
    }
}
