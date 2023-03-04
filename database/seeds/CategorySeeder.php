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
            [
                'name' => 'Italiano',
                'slug' => 'italiano',
                'image' => 'uploads/italiano.png',
            ],
            [
                'name' => 'Giapponese',
                'slug' => 'giapponese',
                'image' => 'uploads/giapponese.png'
            ],
            [
                'name' => 'Messicano',
                'slug' => 'messicano',
                'image' => 'uploads/messicano.png'
            ],
            [
                'name' => 'Carne',
                'slug' => 'carne',
                'image' => 'uploads/carne.png'
            ],
            [
                'name' => 'Pesce',
                'slug' => 'pesce',
                'image' => 'uploads/pesce.png'
            ],
            [
                'name' => 'Vegetariano',
                'slug' => 'vegetariano',
                'image' => 'uploads/vegetariano.png'
            ],
            [
                'name' => 'Hamburger',
                'slug' => 'hamburger',
                'image' => 'uploads/hamburger.png'
            ],
            [
                'name' => 'Pizza',
                'slug' => 'pizza',
                'image' => 'uploads/pizza.png'
            ]
        ];

        foreach($categories as $category) {
            // Category::create([
            //     'slug' => Category::getSlug($category),
            //     'name' => $category['name'],
            //     'image' => $category['image'],
            // ]);
            Category::create($category);
        }
    }
}
