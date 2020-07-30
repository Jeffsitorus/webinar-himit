<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['code', 'bug', 'help', 'solved']);
        $tags->each(function ($t) {
            \App\Tag::create([
                'name' => $t,
                'slug' => Str::slug($t),
            ]);
        });
    }
}
