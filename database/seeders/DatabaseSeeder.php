<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Action;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1) Buat 10 user
        $users = User::factory(10)->create();

        // 2) Buat 5 kategori
        $categories = Category::factory(5)->create();

        // 3) Buat 10 tag
        $tags = Tag::factory(10)->create();

        // 4) Buat 20 artikel dengan make() + save() manual
        //    agar kita bisa set author_id dan category_id secara manual.
        $articles = Article::factory(20)->make()->each(function ($article) use ($users, $categories) {
            $article->author_id = $users->random()->id;
            $article->category_id = $categories->random()->id;
            $article->save();
        });

        // Pastikan seeder jalan hanya jika $users tidak kosong
        if ($users->isNotEmpty()) {
            Comment::factory(50)->make()->each(function ($comment) use ($users, $articles) {
                $comment->user_id = $users->random()->user_id;    // user_id dari $users
                $comment->article_id = $articles->random()->article_id;
                $comment->save();
            });
            

            // 6) Buat 20 media files, lalu di-update uploaded_by
            Media::factory(20)->create([
                'uploaded_by' => $users->random()->id,
            ]);
            

            // 7) Buat 30 actions, lalu di-update user_id & target_id
            Action::factory(30)->create();
            
        }
    }
}
