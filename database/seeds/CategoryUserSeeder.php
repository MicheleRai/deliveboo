<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesUsers = [

        ];
        for($i = 0; $i < 10; $i++) {
            $categoriesUsers[$i]['category_id'] = rand(1, 8);
            $categoriesUsers[$i]['user_id'] = rand(1, 5);
        };

        foreach($categoriesUsers as $categoriesUser){
            DB::table('category_user')->insert($categoriesUser);
        }
    }
}
