<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\TodoItem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            "name" => "admin",
            "email" => "admin@localhost",
            "password" => Hash::make("admin"),
            "admin" => true
        ]);

        Category::factory()->create([
            "name" => "Work"
        ]);

        Category::factory()->create([
            "name" => "School"
        ]);

        Category::factory()->create([
            "name" => "Home"
        ]);

        User::factory(5)->create();

        TodoItem::factory(20)->create([
            "owner_id" => User::first(),
            "is_done" => false
        ]);

        foreach (TodoItem::all() as $todoitem) {
            $users = User::inRandomOrder()->take(rand(1, 3))->pluck("id");
            $todoitem->users()->attach($users);
        }

        // TODO: fix attaching categories to todoitems!
        foreach (TodoItem::all() as $todoitem) {
            $categories = Category::inRandomOrder()->take(rand(1, 4))->pluck("id");
            $todoitem->users()->attach($categories);
        }
    }
}
