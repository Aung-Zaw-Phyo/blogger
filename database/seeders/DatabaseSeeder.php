<?php

namespace Database\Seeders;

use App\Models\Artical;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::factory()->create(["name"=>"Technology"]);
        Category::factory()->create(["name"=>"Entertainment"]);
        Category::factory()->create(["name"=>"Knowledge"]);
        Category::factory()->create(["name"=>"Media"]);
        Category::factory()->create(["name"=>"Education"]);
        
       
    }
}
