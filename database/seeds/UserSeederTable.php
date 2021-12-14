<?php

use App\Models\Category;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $categories_ids = Category::pluck('id')->toArray();


        $newUser = new User();
        $newUser->name = 'user prova';
        $newUser->email = 'emaildiprova@gmail.com';
        $newUser->password = bcrypt('ciao1234');
        $newUser->iva = $faker->numerify('###########');
        $newUser->category_id = Arr::random($categories_ids);
        $newUser->address = $faker->streetName();
        $newUser->city = $faker->city();
        $newUser->zip_code = $faker->numerify('#####');
        $newUser->phone = $faker->numerify('#############');
        $newUser->image = 'https://via.placeholder.com/1280x720.png?text=Nome+Del+Ristorante';
        $newUser->description = $faker->text(100);

        $newUser->save();
    

        for($i=0;$i<27;$i++){
        

            $user = new User();

            $user->name = $faker->name();
            $user->email = $faker->email();
            $user->password = bcrypt($faker->password());
            $user->category_id = Arr::random($categories_ids);
            $user->iva = $faker->numerify('###########');
            $user->address = $faker->streetName();
            $user->city = $faker->city();
            $user->zip_code = $faker->numerify('#####');
            $user->phone = $faker->numerify('#############');
            $user->image = 'https://via.placeholder.com/1280x720.png?text=Nome+Del+Ristorante';
            $user->description = $faker->text(100);

            $user->save();
        }
    }
}
