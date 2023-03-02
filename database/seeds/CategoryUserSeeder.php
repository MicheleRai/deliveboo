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
        // $categoriesUsers = [];

        // for($i = 0; $i < 20; $i++) {
        //     $categoriesUsers[$i]['category_id'] = rand(1, 8);
        //     $categoriesUsers[$i]['user_id'] = rand(1, 5);
        // };

        // foreach($categoriesUsers as $categoriesCouple){
        //     DB::table('category_user')->insert($categoriesCouple);
        // }

        $json = file_get_contents(__DIR__ . '/../../category_user.json');
        $category_user = json_decode($json, true);
        foreach($category_user as $cat_user){
            DB::table('category_user')->insert($cat_user);
        }
    }
}
