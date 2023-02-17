<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Italiano', 'Giapponese', 'Messicano', 'Carne', 'Pesce', 'Vegetariano', 'Vietnamese', 'Inglese',
        ];

        foreach($categories as $category) {
            Category::create([
                'slug' => Category::getSlug($category),
                'name' => $category,
            ]);
        }
    }
}
