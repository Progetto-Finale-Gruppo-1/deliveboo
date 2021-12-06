<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<8;$i++){

            $category = new Category();
            $category->name = $faker->name();
            $category->save();
        }
    }
}
