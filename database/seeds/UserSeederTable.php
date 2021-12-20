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
                'name' => 'Ba Asian Mood',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '9871113218',
                'address'=> 'Via Raffaello Sanzio, 22',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '333152312',
                'image'=> 'https://flawless.life/wp-content/uploads/2020/02/I_migliori_ristoranti_cinesi_Milano_BonWei.jpg',
                'description'=> 'Ba Asian Mood non è semplicemente un ristorante, ma come già deducibile dal nome, è un mood, è uno stile di vita: 100% cinese. Il ristorante è di Marco Liu, fratello di Claudio, proprietario di un altro ristorante stellato (Iyo), e di Giulia del ristorante Gong (di cui abbiamo parleremo subito dopo). Inutile specificare che il talento ai fornelli è sicuramente un dono di famiglia.'
            ],
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
                'description'=> 'Il nostro locale si compone di due ambienti ampi ed accoglienti, arredati con gusto e sobrietà. Uno è dedicato agli apericena, l\'altro, più ampio, è riservato alle cene e ai banchetti. A disposizione dei nostri clienti, ampio parcheggio, anche per camionisti, con sosta illimitata per chi mangia al ristorante.'
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
                'description'=> 'Ginza Sushi è un locale che si trova a Milano, in via Viale Ergisto Bezzi 79 numero . L’attività ha rivevuto un giudizio di 79 dal nostro raccoglitore di recensioni dal web, lo Sluurpometro, che scandaglia le recensioni presenti sul web, e le pesa restituendo una media ponderata in centesimi.'
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
                'description'=> 'Prova la cucina della Locanda Il Casale. La tradizione incontra l\'innovazione. Disponibilità per eventi e pranzi e cene aziendali.Disponibilità di B&B con 4 camere arredate.'
            ],
            [
                'name' => 'Mexico',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '9876123874',
                'address'=> 'Via Portuense, 83',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '3331333337',
                'image'=> 'https://lh3.googleusercontent.com/proxy/3zAHtUILgltsI7XBILU-GqQa38TCM0WTaFMRVfFCIYKZv4N5C9wIkpgSG9RebY3nBA1k7t-eByfu785BIiGMnQtBp8AJd7XbieNp4mSm8W9yozjNtzXY0w2X',
                'description'=> 'Il ristorante messicano Puerto México è a Roma in via Portuense 84.Benvenuto nel sito ufficiale del ristorante messicano Puerto México di via Portuense al civico 84. Ex México all’Aventino, il locale si è oggi rinnovato nel nome e negli arredi. Stessa qualità e creatività di sempre, stessa inossidabile passione per la cultura e la tradizione messicana. Con delle attrattive in più, in tema di stile e colori.Da non perdere l’appuntamento settimanale caratterizzata da uno “real” stile messicano. La novità è poter scegliere su due proposte di menù alternative, dove l’ atmosfera della serata sarà accompagnata dal duo dei “MARIACHI” più famosi d’Italia.'
            ],
            [
                'name' => 'Churrascaria San Siro',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '9876127774',
                'address'=> 'San Siro, 83',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '3331344337',
                'image'=> 'https://lh3.googleusercontent.com/proxy/3zAHtUILgltsI7XBILU-GqQa38TCM0WTaFMRVfFCIYKZv4N5C9wIkpgSG9RebY3nBA1k7t-eByfu785BIiGMnQtBp8AJd7XbieNp4mSm8W9yozjNtzXY0w2X',
                'description'=> 'Non solo panini e primi piatti: Churrascaria San Siro Milano propone anche una ricca scelta di specialità di carne alla griglia e hamburger, che costituiscono il punto di forza del locale.'
            ],
            [
                'name' => 'Churrascaria San Siro',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '9876127774',
                'address'=> 'San Siro, 83',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '3331344337',
                'image'=> 'https://www.ristorantecarnemilano.it/wp-content/uploads/2018/04/foto9.jpg',
                'description'=> 'Non solo panini e primi piatti: Churrascaria San Siro Milano propone anche una ricca scelta di specialità di carne alla griglia e hamburger, che costituiscono il punto di forza del locale.'
            ],
            [
                'name' => 'Myke',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '8876127774',
                'address'=> 'Via Quadrio, 25',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '3291345737',
                'image'=> 'https://media-cdn.tripadvisor.com/media/photo-s/13/e3/2b/94/pulled-pork.jpg',
                'description'=> 'Il primo street food senza sensi di colpa grazie alla cottura a bassa temperatura. Semplice, sano e buono.'
            ],
            [
                'name' => 'Langosteria',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '8845127774',
                'address'=> 'Via Savona, 10',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '3202345737',
                'image'=> 'https://flawless.life/wp-content/uploads/2019/07/i-migliori-ristoranti-di-pesce-di-milano-la-briciola-mare.jpg',
                'description'=> 'Langosteria è il progetto di Enrico Buonocore iniziato con un locale in via Savona e arrivato ad aprire ben tre sedi a Milano: un ristorante, un bistrot e un cafè dal nome divenuto ormai celebre. Se nella vita siete amanti delle certezze, non potete non provare il King Crab, piatto signature di Langosteria sempre presente e indicato tutto l’anno'
            ],
            [
                'name' => 'La Risacca',
                'email'=> $faker->email(),
                'password'=> bcrypt($faker->password()),
                'iva' => '8142127774',
                'address'=> 'Via Marcona, 6',
                'city'=> 'Milano',
                'zip_code'=> '20068',
                'phone'=> '3202345737',
                'image'=> 'https://flawless.life/wp-content/uploads/2020/05/i-Migliori-Ristoranti-di-Pesce-a-Milano-LaRisacca.jpg',
                'description'=> 'L’Osteria Vip La Risacca 6 dal 1982 serve pesce fresco e di qualità in zona Cinque Giornate. Un locale dagli spazi ampi, dove gustare specialità che variano ogni stagione a seconda di quello che offre il mare. Potrete sperimentare il menù degustazione che include i piatti più rappresentativi del ristorante o scegliere direttamente dalla carta'
            ],

        ];

        $categories_ids = Category::pluck('id')->toArray();

    

        foreach($restaurants as $restaurant){
            for($i=0; $i<4; $i++){
            $user = new User();


            $user->name = $restaurant['name'];
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
