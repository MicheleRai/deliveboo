<?php

use App\Order;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<40; $i++) {
            $order = Order::create([
                'email_user' => $faker->email(),
                'name_user' => $faker->name(),
                'address' => $faker->address(),
                'note' => $faker->sentence(),
                'tot_price' => rand(1, 100)
            ]);
        }
    }
}
