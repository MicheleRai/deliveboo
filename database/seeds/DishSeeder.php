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
        $dishes = config('dishes');
        foreach ($dishes as $dish) {
            Dish::create($dish);
        }
    }
}
