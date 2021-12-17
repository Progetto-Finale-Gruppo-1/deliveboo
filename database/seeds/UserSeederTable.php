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
        $restaurants = [
            [
                'name' => 'Carpe Diem',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '9876543218',
                'address'=> 'Via Lazzaro Papi, 5',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '333132312',
                'image'=> 'https://media-cdn.tripadvisor.com/media/photo-s/15/29/39/c5/carpe-diem.jpg',
                'description'=> $faker->text(100)
            ],
            [
                'name' => 'Ginza',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '9876521857',
                'address'=> 'Via Roma, 3',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '333132334',
                'image'=> 'https://www.ristoranteginza.com/wp-content/uploads/2019/04/ristorante-2.jpg',
                'description'=> $faker->text(100)
            ],
            [
                'name' => 'Il Casale Ristorante',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '9876123857',
                'address'=> 'Via Pescara, 3',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '333131111',
                'image'=> 'https://media-cdn.tripadvisor.com/media/photo-s/05/c8/4b/81/ristorante-al-casale.jpg',
                'description'=> $faker->text(100)
            ],
        ];

        $categories_ids = Category::pluck('id')->toArray();

    

        foreach($restaurants as $restaurant){
            for($i=0; $i<20; $i++){
            $user = new User();


            $user->name = $restaurant['name'].$i;
            $user->email = $faker->email();
            $user->password = $restaurant['password'];
            $user->category_id = Arr::random($categories_ids);
            $user->iva = $faker->numerify('###########');
            $user->address = $restaurant['address'];
            $user->city = $restaurant['city'];
            $user->zip_code = $restaurant['zip_code'];
            $user->phone = $faker->numerify('##########');;
            $user->image = $restaurant['image'];
            $user->description = $faker->text(100);

            $user->save();
            
            };

        }
    }
}
