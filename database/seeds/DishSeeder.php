<?php

use App\Dish;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(__DIR__ . '/../../dishes.json');
        $dishes = json_decode($json, true);
        foreach ($dishes as $dish) {
            Dish::create($dish);
        }
    }
}
