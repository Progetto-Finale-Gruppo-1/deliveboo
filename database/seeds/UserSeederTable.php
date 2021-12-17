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
                'image'=> 'data:image/jpeg;base64,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',
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
