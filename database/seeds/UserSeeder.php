<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
                'name' => 'Da Davide',
                'address' => 'Via Mazzini, 24 - Alba Adriatica (TE)',
                'vat_number' => '01234567890',
                'slug' => 'da-davide',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'daluigi@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Da Luigi',
                'address' => 'Via Silone, 56 - Nereto (TE)',
                'vat_number' => '01234567891',
                'slug' => 'da-luigi',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'daandrea@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Da Andrea',
                'address' => 'Viale Virgilio, 3 - Andria (BT)',
                'vat_number' => '01234567892',
                'slug' => 'da-andrea',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'dakenta@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Da Kenta',
                'address' => 'Piazza San Marco, 35 - Firenze (FI)',
                'vat_number' => '01234567893',
                'slug' => 'da-kenta',
                'logo_image' => '',
                'cover_image' => '',
            ],
            [
                'email' => 'damichele@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Da Michele',
                'address' => 'Viale Le Noci, 18 - Bari (BA)',
                'vat_number' => '01234567894',
                'slug' => 'da-michele',
                'logo_image' => '',
                'cover_image' => '',
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
