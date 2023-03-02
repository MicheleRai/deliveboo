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

        for($i = 1; $i <= 100; $i++) {
            $dishesOrders[$i]['dish_id'] = rand(1, 27);
            $dishesOrders[$i]['order_id'] = ($i<=40 ? $i : rand(1, 40));
        };

        foreach($dishesOrders as $dishOrder){
            DB::table('dish_order')->insert($dishOrder);
        }
    }
}
