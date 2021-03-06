<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);
//        $this->call(PostTableSeeder::class);
//        $this->call(PostCategoryTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(ResourceTableSeeder::class);
        $this->call(ResourceCategoryTableSeeder::class);
    }
}
