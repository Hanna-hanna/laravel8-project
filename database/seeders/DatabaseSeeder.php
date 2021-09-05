<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'excerpt' => '<p>Excerpt for My Family Post</p>',
            'body' => '<p>Drzewo życia – amerykański dramat filmowy z elementami kina fantasy w reżyserii i według scenariusza Terrence’a Malicka. Światowa premiera filmu miała miejsce 16 maja 2011 roku, podczas 64. Międzynarodowego Festiwalu Filmowego w Cannes, gdzie film wyświetlany był w Konkursie Głównym.</p>',
            'slug' => 'my-family-post'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'excerpt' => '<p>Excerpt for My Personal Post</p>',
            'body' => '<p>Drzewo życia – amerykański dramat filmowy z elementami kina fantasy w reżyserii i według scenariusza Terrence’a Malicka. Światowa premiera filmu miała miejsce 16 maja 2011 roku, podczas 64. Międzynarodowego Festiwalu Filmowego w Cannes, gdzie film wyświetlany był w Konkursie Głównym.</p>',
            'slug' => 'my-personal-post'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'excerpt' => '<p>Excerpt for My Work Post</p>',
            'body' => '<p>Drzewo życia – amerykański dramat filmowy z elementami kina fantasy w reżyserii i według scenariusza Terrence’a Malicka. Światowa premiera filmu miała miejsce 16 maja 2011 roku, podczas 64. Międzynarodowego Festiwalu Filmowego w Cannes, gdzie film wyświetlany był w Konkursie Głównym.</p>',
            'slug' => 'my-work-post'
        ]);
    }
}
