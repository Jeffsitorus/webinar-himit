<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Laravel 7', 'PHP', 'MySQL', 'JavaScript', 'CodeIgniter']);
        $categories->each(function ($c) {
            \App\Category::create([
                'name' => $c,
                'slug' => Str::slug($c)
            ]);
        });
    }
}
