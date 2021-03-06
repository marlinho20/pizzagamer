<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        date_default_timezone_set('America/Sao_Paulo');

        $user     = User::factory()->create();  

        $categoryPost = Category::create([
            'title'       => 'Evento',
            'description' => $faker->paragraph(),
            'type'        => 'post',
            'uri'         => Str::slug('Evento' , '-')
        ]);

        for ($i=0; $i < 12; $i++) { 

            $title = $faker->sentence(6);
            $content = "<h2>{$faker->sentence(6)}</h2><p></p>
                        <p>{$faker->sentence(10)}</p><p></p>
                        <h3>{$faker->sentence(4)}</h3>
                        <p>{$faker->sentence(20)}</p><p></p>
                        <p>{$faker->sentence(30)}</p>
                        <ul>
                            <li>{$faker->sentence(2)}</li>
                            <li>{$faker->sentence(2)}</li>
                            <li>{$faker->sentence(2)}</li>
                        </ul>
                        <p>{$faker->sentence(30)}</p>";

            Article::create([
                'user_id'     => $user->id,
                'category_id' => $categoryPost->id,
                'title'       => $title,
                'uri'         => Str::slug($title, '-'),
                'description' => $faker->sentence(10),
                'content'     => $content,
                'cover'       => 'media/pizza/default.png',
                'views'       => 0,
                'type'        => 'post',
                'status'      => 'active',
                'opening_at'  => date('Y-m-d H:i:s')
            ]);
        }


        for ($i=0; $i < 10; $i++) { 

            $title = $faker->sentence(6);

            Article::create([
                'user_id'     => $user->id,
                'title'       => $title,
                'uri'         => Str::slug($title, '-'),
                'description' => $faker->sentence(10),
                'cover'       => 'media/pizza/default.png',
                'video'       => 'https://www.youtube.com/embed/X8NFkUQNeek',
                'views'       => 0,
                'type'        => 'video',
                'status'      => 'active',
                'opening_at'  => date('Y-m-d H:i:s')
            ]);
        }
    }
}