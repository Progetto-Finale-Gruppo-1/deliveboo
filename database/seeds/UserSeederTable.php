<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $newUser = new User();
        $newUser->name = 'user prova';
        $newUser->email = 'emaildiprova@gmail.com';
        $newUser->password = bcrypt('ciao1234');

        $newUser->save();
    

        for($i=0;$i<27;$i++){
        

            $user = new User();

            $user->name = $faker->name();
            $user->email = $faker->email();
            $user->password = bcrypt($faker->password());
            //$user->category_id = $faker->randomNumber(3);

            $user->save();
        }
    }
}
