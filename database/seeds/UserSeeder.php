<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'dadavide@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Ristorante Da Davide',
                'address' => 'Via Europa, 24 - Alba Adriatica (TE)',
                'vat_number' => '01234567890',
                'slug' => 'ristorante-da-davide',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'daluigi@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Trattoria Da Luigi',
                'address' => 'Via Silone, 56 - Nereto (TE)',
                'vat_number' => '09234567891',
                'slug' => 'trattoria-da-luigi',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'daandrea@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Pizzeria Da Andrea',
                'address' => 'Viale Virgilio, 3 - Andria (BT)',
                'vat_number' => '01234567892',
                'slug' => 'pizzeria-da-andrea',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'dakenta@gmail.com',
                'password' => Hash::make('password'),
                'name' => "Kenta's Sushi",
                'address' => 'Piazza San Marco, 35 - Firenze (FI)',
                'vat_number' => '01234567893',
                'slug' => 'kenta-s-sushi',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'damichele@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'I Panzerotti Di Michele',
                'address' => 'Viale Le Noci, 18 - Bari (BA)',
                'vat_number' => '01234567894',
                'slug' => 'i-panzerotti-di-michele',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'lascaletta@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'La Scaletta',
                'address' => 'Via Mazzini, 25 - Alba Adriatica (TE)',
                'vat_number' => '01234547890',
                'slug' => 'la-scaletta',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'ziomamo@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Zio Mamo',
                'address' => 'Via Silone, 57 - Nereto (TE)',
                'vat_number' => '01224567891',
                'slug' => 'zio-mamo',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'lalocanda@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'La Locanda',
                'address' => 'Viale Virgilio, 6 - Andria (BT)',
                'vat_number' => '01234567872',
                'slug' => 'la-locanda',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'ilposto@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Il Posto',
                'address' => 'Piazza San Marco, 25 - Firenze (FI)',
                'vat_number' => '01284567893',
                'slug' => 'il-posto',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'latavernadelpriore@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'La Taverna del Priore',
                'address' => 'Viale Le Noci, 19 - Bari (BA)',
                'vat_number' => '01234567994',
                'slug' => 'la-taverna-del-priore',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'mcdonald@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'McDonald\'s',
                'address' => 'Viale Italia, 19 - Bari (BA)',
                'vat_number' => '01234567891',
                'slug' => 'mc-donalds',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'spaghetterialaconchiglia@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Spaghetteria La Conchiglia',
                'address' => 'Viale Le Noci, 88 - Bari (BA)',
                'vat_number' => '01654567894',
                'slug' => 'spaghetteria la conchiglia',
                'logo_image' => '',
                'cover_image' => '',
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
