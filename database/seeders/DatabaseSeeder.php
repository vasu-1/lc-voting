<?php

namespace Database\Seeders;
use App\Models\Idea;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vote;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        Category::factory()->create(['name' => 'Category 1']);
        Category::factory()->create(['name' => 'Category 2']);
        Category::factory()->create(['name' => 'Category 3']);
        Category::factory()->create(['name' => 'Category 4']);

        Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-purple text-white']);
        Status::factory()->create(['name' => 'In Progress', 'classes' => 'bg-yellow text-white']);
        Status::factory()->create(['name' => 'Implemented', 'classes' => 'bg-green text-white']);
        Status::factory()->create(['name' => 'Closed', 'classes' => 'bg-red text-white']);


        User::factory()->create([
            'name' => 'Vashishth',
            'email' => 'vashishthchaudhary48@gmail.com',
        ]);

        User::factory(19)->create();
        
        Idea::factory(100)->existing()->create();

        // Generate unique votes. Ensure idea_id and user_id are unique for each row
        foreach (range(1, 20) as $user_id) {
            foreach (range(1, 100) as $idea_id) {
                if ($idea_id % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id,
                    ]);
                }
            }
        }
    }
}