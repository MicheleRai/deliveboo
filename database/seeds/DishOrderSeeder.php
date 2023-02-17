<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishesOrders = [];

        for($i = 1; $i <= 50; $i++) {
            $dishesOrders[$i]['dish_id'] = rand(1, 15);
            $dishesOrders[$i]['order_id'] = ($i<=20 ? $i : rand(1, 20));
        };

        foreach($dishesOrders as $dishOrder){
            DB::table('dish_order')->insert($dishOrder);
        }
    }
}
