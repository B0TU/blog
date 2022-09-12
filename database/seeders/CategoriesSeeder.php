<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{

    protected array $categories_data = [
        [
            'name' => 'Laravel',
            'color' => 'green',
        ],
        [
            'name' => 'PHP',
            'color' => 'blue',
        ],
        [
            'name' => 'JavaScript',
            'color' => 'cyan',
        ],
        [
            'name' => 'CSS',
            'color' => 'teal',
        ],
        [
            'name' => 'HTML',
            'color' => 'amber',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ( $this->categories_data as $category_data ) {
            $category = category::where('slug', str($category_data['name']))->first();

            if ( ! $category ) {
                $category = new Category();
            }

            $category->name = $category_data['name'];
            $category->color = $category_data['color'];
            $category->save();

        }
    }
}
